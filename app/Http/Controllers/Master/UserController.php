<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'nullable|string|min:6',
            'phone_number'  => 'nullable|string|max:15',
            'address'       => 'nullable|string|max:255',
            'role_id'       => 'required|exists:roles,role_id',
        ]);
    
        DB::beginTransaction();
    
        try {
            // Handle default password jika tidak diisi
            $password = $request->filled('password') ? $request->password : 'admin';
    
            // Buat user
            $user = User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($password),
                'phone_number'  => $request->phone_number,
                'address'       => $request->address,
                'created_by'    => Auth::user()->user_id ?? null,
                'created_at'    => now(),
            ]);
    
            // Simpan role ke tabel user_roles
            UserRole::create([
                'user_id'       => $user->user_id,
                'role_id'       => $request->role_id,
                'created_by'    => Auth::user()->user_id ?? null,
                'created_at'    => now(),
            ]);
    
            DB::commit();
    
            return redirect()->route('user-index')->with('success', 'User berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal menyimpan data: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $user = User::with('userRole')->findOrFail($id);
        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name'         => 'nullable|string|max:255',
                'email'        => 'nullable|email|unique:users,email,' . $id . ',user_id',
                'password'     => 'nullable|string|min:6',
                'phone_number' => 'nullable|string|max:15',
                'address'      => 'nullable|string|max:255',
                'role'         => 'nullable|json', // expecting JSON array
            ]);

            // Dynamic user fields
            $fields = ['name', 'email', 'phone_number', 'address'];
            $updateUser = [];

            foreach ($fields as $field) {
                if ($request->filled($field)) {
                    $updateUser[$field] = $request->$field;
                }
            }

            if ($request->filled('password')) {
                $updateUser['password'] = Hash::make($request->password);
            }

            $updateUser['updated_at'] = now();
            $updateUser['updated_by'] = Auth::user()->user_id;

            User::where('user_id', $id)->update($updateUser);

            // /**
            //  * MULTI ROLE HANDLING
            //  */
            // if ($request->filled('role')) {
            //     $roleIds = json_decode($request->role); // role should be JSON array from frontend
            //     $currentRoles = UserRole::where('user_id', $id)->pluck('role_id')->toArray();

            //     // Tambah atau update role yang baru
            //     foreach ($roleIds as $role_id) {
            //         UserRole::updateOrCreate(
            //             ['user_id' => $id, 'role_id' => $role_id],
            //             ['updated_at' => now(), 'updated_by' => Auth::user()->user_id]
            //         );
            //     }

            //     // Hapus role yang sudah tidak dipakai
            //     $rolesToDelete = array_diff($currentRoles, $roleIds);
            //     if (!empty($rolesToDelete)) {
            //         UserRole::where('user_id', $id)
            //             ->whereIn('role_id', $rolesToDelete)
            //             ->delete();
            //     }
            // }

            DB::commit();
            return redirect()->route('user-index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            UserRole::where('user_id', $id)->delete();

            $user = User::findOrFail($id);
            $user->delete();


            DB::commit();
            return redirect()->route('user-index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete user');
        }
    }
}
