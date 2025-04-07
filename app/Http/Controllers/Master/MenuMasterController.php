<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use App\Models\MenuMaster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = MenuMaster::orderBy('menu_master_order')->get();

        return view('admin.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = MenuMaster::whereNull('parent_id')->get();        
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_master_name'  => 'required|string|max:100',
            'menu_master_slug'  => 'required|string|max:100|unique:menu_masters,menu_master_slug',
            'menu_master_type'  => 'nullable|string|max:100',
            'menu_master_icon'  => 'nullable|string|max:100',
            'menu_master_link'  => 'nullable|string|max:100',
            'menu_master_order' => 'nullable|integer',
            'parent_id'         => 'nullable|exists:menu_masters,menu_master_id',
        ]);

        DB::beginTransaction();
        try {
            MenuMaster::create([
                'menu_master_name'  => $request->menu_master_name,
                'menu_master_slug'  => $request->menu_master_slug,
                'menu_master_type'  => $request->menu_master_type,
                'menu_master_icon'  => $request->menu_master_icon,
                'menu_master_link'  => $request->menu_master_link,
                'menu_master_order' => $request->menu_master_order,
                'parent_id'         => $request->parent_id,
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by'        => Auth::user()->user_id,
            ]);

            DB::commit();

            return redirect()->route('admin.menu.index')->with('success', 'Menu created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create menu.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuMaster $id)
    {
        $menu = MenuMaster::findOrFail($id);
        $parentMenus = MenuMaster::whereNull('parent_id')->where('menu_master_id', '!=', $id)->get();
        return view('admin.menu.edit', compact('menu', 'parentMenus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuMaster $menuMaster)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuMaster $id)
    {
        $request->validate([
            'menu_master_name'  => 'required|string|max:100',
            'menu_master_slug'  => 'required|string|max:100|unique:menu_masters,menu_master_slug,' . $id->menu_master_id . ',menu_master_id',
            'menu_master_type'  => 'nullable|string|max:100',
            'menu_master_icon'  => 'nullable|string|max:100',
            'menu_master_link'  => 'nullable|string|max:100',
            'menu_master_order' => 'nullable|integer',
            'parent_id'         => 'nullable|exists:menu_masters,menu_master_id',
        ]);

        DB::beginTransaction();
        try {
            $id->update([
                'menu_master_name'  => $request->menu_master_name,
                'menu_master_slug'  => $request->menu_master_slug,
                'menu_master_type'  => $request->menu_master_type,
                'menu_master_icon'  => $request->menu_master_icon,
                'menu_master_link'  => $request->menu_master_link,
                'menu_master_order' => $request->menu_master_order,
                'parent_id'         => $request->parent_id,
                'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_by'        => Auth::user()->user_id,
            ]);

            DB::commit();

            return redirect()->route('admin.menu.index')->with('success', 'Menu updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to update menu.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuMaster $id)
    {
        DB::beginTransaction();
        try {
            $menu = MenuMaster::findOrFail($id);
            $menu->delete();

            DB::commit();
            return redirect()->route('menu-master.index')->with('success', 'Menu deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete menu.');
        }
    }
}
