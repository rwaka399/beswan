<?php

namespace App\Http\Controllers;

use App\Models\LessonPackage;
use Illuminate\Support\Facades\Log;
use App\Models\Transaction;
use App\Models\Invoice;
use App\Models\LogKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceNotification;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('handleWebhook');
        Configuration::setXenditKey(config('services.xendit.secret_key'));
    }

    // public function listPackages()
    // {
    //     return view('dashboard', [
    //         'lesson_packages' => LessonPackage::all(),
    //     ]);
    // }

    public function showCheckout($lessonPackageId)
    {
        $package = LessonPackage::findOrFail($lessonPackageId);
        return view('checkout', compact('package'));
    }

    public function createInvoice(Request $request)
    {
        $request->validate([
            'lesson_package_id' => 'required|exists:lesson_packages,lesson_package_id',
            'email' => 'required|email',
        ]);

        try {
            $package = LessonPackage::findOrFail($request->lesson_package_id);
            $user = Auth::user();

            if (!$user) {
                Log::error('User not authenticated in createInvoice');
                throw new \Exception('User not authenticated');
            }

            Log::info('Creating invoice for user: ' . $user->user_id . ', package: ' . $package->lesson_package_id);

            $apiInstance = new InvoiceApi();

            $external_id = 'invoice-' . time() . '-' . $user->user_id;
            $create_invoice_request = new CreateInvoiceRequest([
                'external_id' => $external_id,
                'amount' => $package->lesson_package_price, // Pastikan amount sesuai (integer)
                'payer_email' => $request->email,
                'description' => 'Pembayaran untuk paket ' . $package->lesson_package_name,
                'success_redirect_url' => url('/transaction/success'),
                'failure_redirect_url' => url('/transaction/failed'),
                'currency' => 'IDR',
            ]);

            Log::info('Sending invoice request to Xendit: ' . json_encode($create_invoice_request));

            $result = $apiInstance->createInvoice($create_invoice_request);

            Log::info('Invoice created successfully: ' . json_encode($result));

            $transactionData = [
                'external_id' => $external_id,
                'lesson_package_id' => $package->lesson_package_id,
                'user_id' => $user->user_id,
                'amount' => $package->lesson_package_price, // Sesuaikan dengan bigInteger
                'status' => 'pending',
                'payer_email' => $request->email,
                'description' => $create_invoice_request->getDescription(),
                'invoice_url' => $result->getInvoiceUrl(),
            ];

            Log::info('Creating transaction with data: ' . json_encode($transactionData));

            $transaction = Transaction::create($transactionData);

            Log::info('Transaction created with ID: ' . $transaction->transaction_id);

            $invoiceData = [
                'external_id' => $external_id,
                'xendit_invoice_id' => $result->getId(),
                'transaction_id' => $transaction->transaction_id, // Gunakan transaction_id
                'user_id' => $user->user_id,
                'lesson_package_id' => $package->lesson_package_id,
                'amount' => $package->lesson_package_price, // Sesuaikan dengan bigInteger
                'payer_email' => $request->email,
                'description' => $create_invoice_request->getDescription(),
                'status' => 'pending',
                'invoice_url' => $result->getInvoiceUrl(),
                'expires_at' => $result->getExpiryDate(),
            ];

            Log::info('Creating invoice with data: ' . json_encode($invoiceData));

            $invoice = Invoice::create($invoiceData);

            if (!$request->wantsJson()) {
                return redirect($result->getInvoiceUrl());
            }

            return response()->json([
                'message' => 'Invoice created successfully',
                'invoice_url' => $result->getInvoiceUrl(),
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating invoice: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);

            if (!$request->wantsJson()) {
                return redirect()->back()->with('error', 'Error creating invoice: ' . $e->getMessage());
            }

            return response()->json([
                'message' => 'Error creating invoice',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function handleWebhook(Request $request)
    {
        try {
            $data = $request->all();

            $external_id = $data['external_id'];
            $status = strtolower($data['status']);
            $payment_method = $data['payment_method'] ?? null;

            $transaction = Transaction::where('external_id', $external_id)->first();
            if ($transaction) {
                $transaction->status = $status;
                $transaction->payment_method = $payment_method;
                $transaction->save();
            }

            $invoice = Invoice::where('external_id', $external_id)->first();
            if ($invoice) {
                $invoice->status = $status;
                $invoice->save();

                if ($status === 'paid' && !$invoice->logKeuangan()->exists()) {
                    $logKeuanganData = [
                        'invoice_id' => $invoice->invoice_id, // Gunakan invoice_id
                        'transaction_id' => $invoice->transaction_id,
                        'user_id' => $invoice->user_id,
                        'lesson_package_id' => $invoice->lesson_package_id,
                        'amount' => $invoice->amount, // Sesuaikan dengan bigInteger
                        'transaction_type' => 'income',
                        'payment_method' => $payment_method,
                        'description' => 'Pembayaran untuk paket ' . $invoice->lessonPackage->lesson_package_name,
                        'transaction_date' => now(),
                    ];

                    Log::info('Creating log keuangan with data: ' . json_encode($logKeuanganData));

                    LogKeuangan::create($logKeuanganData);

                    Mail::to($invoice->payer_email)->send(new InvoiceNotification($invoice));
                }
            }

            return response()->json([
                'message' => 'Webhook received',
                'status' => $status,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error processing webhook',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function success(Request $request)
    {
        $invoice = Invoice::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->first();
        return view('success', compact('invoice'));
    }

    public function failed()
    {
        return view('failed');
    }

    public function financialReport()
    {
        $logs = LogKeuangan::with(['user', 'lessonPackage'])->orderBy('transaction_date', 'desc')->get();
        return view('report', compact('logs'));
    }

    public function invoiceHistory()
    {
        $invoices = Invoice::where('user_id', Auth::id())->with('lessonPackage')->get();
        return view('history', compact('invoices'));
    }

}