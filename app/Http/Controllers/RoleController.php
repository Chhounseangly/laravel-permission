<?php

namespace App\Http\Controllers;

use App\Models\Role as ModelsRole;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = ModelsRole::get();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create_role');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name,
        ]);
        return redirect()->intended('/admin')->with('Success', 'Added role success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsRole $role)
    {
        return view('admin.roles.edit_role', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsRole $role)
    {
        $role->name = $request->name;
        $role->save();
        return redirect('/admin')->with('message', 'Edit role done.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsRole $role)
    {
        $role->delete();
        return redirect('/admin')->with('message', 'Delete role done.');
    }
}
