<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255|unique:roles',
            'role_description' => 'required|string|max:255',
        ]);


        DB::beginTransaction();
        try {
            $userId = Auth::user()->user_id;

            Role::create([
                'role_name' => $request->role_name,
                'role_description' => $request->role_description,
                'created_by' => $userId
            ]);

            DB::commit();

            return redirect()->route('role-index')->with('success', 'Role created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create role.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,role_name,' .$request->role_id . ',role_id',
            'role_description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            Role::where('role_id', $request->role_id)->update([
                'role_name'         => $request->role_name,
                'role_description'  => $request->role_description,
                'updated_by'        => auth()->user()->user_id,
            ]);

            DB::commit();

            return redirect()->route('admin.role.index')->with('success', 'Role updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to update role.');
        }
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        DB::beginTransaction();
        try {
            $role->delete();

            DB::commit();

            return redirect()->route('admin.role.index')->with('success', 'Role deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to delete role.');
        }
        return redirect()->route('admin.role.index')->with('success', 'Role deleted successfully.');
    }
}
