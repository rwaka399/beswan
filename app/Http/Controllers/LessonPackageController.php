<?php

namespace App\Http\Controllers;

use App\Models\LessonPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonPackageController extends Controller
{
    /**
     * Display a listing of the lesson packages.
     */
    public function index()
    {
        $lessonPackages = LessonPackage::with(['createdBy', 'updatedBy'])->get();
        return view('lesson_packages.index', compact('lessonPackages'));
    }

    /**
     * Show the form for creating a new lesson package.
     */
    public function create()
    {
        return view('lesson_packages.create');
    }

    /**
     * Store a newly created lesson package in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lesson_package_name' => 'nullable|string|max:100',
            'lesson_duration' => 'nullable|integer',
            'lesson_package_price' => 'nullable|integer|min:0',
        ]);

        LessonPackage::create([
            'lesson_package_name' => $request->lesson_package_name,
            'lesson_duration' => $request->lesson_duration,
            'lesson_package_price' => $request->lesson_package_price,
            'created_by' => Auth::user()->user_id,
            'updated_by' => Auth::user()->user_id,
        ]);

        return redirect()->route('lesson-packages.index')->with('success', 'Lesson package created successfully.');
    }

    /**
     * Display the specified lesson package.
     */
    public function show(LessonPackage $lessonPackage)
    {
        $lessonPackage->load(['createdBy', 'updatedBy']);

        return view('lesson_packages.show', compact('lessonPackage'));
    }

    /**
     * Show the form for editing the specified lesson package.
     */
    public function edit(LessonPackage $lessonPackage)
    {
        return view('lesson_packages.edit', compact('lessonPackage'));
    }

    /**
     * Update the specified lesson package in storage.
     */
    public function update(Request $request, LessonPackage $lessonPackage)
    {
        $request->validate([
            'lesson_package_name' => 'nullable|string|max:100',
            'lesson_duration' => 'nullable|integer',
            'lesson_package_price' => 'nullable|integer|min:0',
        ]);

        $lessonPackage->update([
            'lesson_package_name' => $request->lesson_package_name,
            'lesson_duration' => $request->lesson_duration,
            'lesson_package_price' => $request->lesson_package_price,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('lesson-packages.index')->with('success', 'Lesson package updated successfully.');
    }

    /**
     * Remove the specified lesson package from storage.
     */
    public function destroy(LessonPackage $lessonPackage)
    {
        $lessonPackage->delete();
        return redirect()->route('lesson-packages.index')->with('success', 'Lesson package deleted successfully.');
    }
}