<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('children')->get();
        $allMenus = Menu::all();

        return view('layouts.menu.index', compact('menus', 'allMenus'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        // Remove 'parent_id' from all menus to ensure exclusivity
        Menu::whereIn('id', $request->child_menus ?? [])->update(['parent_id' => null]);

        // Assign the selected child menus to the new parent
        if ($request->has('child_menus')) {
            Menu::whereIn('id', $request->child_menus)->update(['parent_id' => $id]);
        }

        return redirect()->back()->with('success', 'Child menus updated successfully!');
    }
}
