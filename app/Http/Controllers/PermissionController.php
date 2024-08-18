<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\Permission as ModelPermission;


class PermissionController extends Controller
{
    protected $permission;
    /**
     * Create a new controller instance.
     */
    public function __construct(ModelPermission $modelPermission)
    {
        $this->permission = $modelPermission;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permission->get();
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create_permission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->name,
        ]);
        return redirect()->intended('/admin/permission')->with('message', 'Added permisssion success');
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
    public function edit(ModelPermission $modelPermission)
    {
        $permission = $modelPermission;
        return view('admin.permission.edit_permission', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelPermission $modelPermission)
    {
        $modelPermission->name = $request->name;
        $modelPermission->save();
        return redirect()->intended('/admin/permission')->with('message', 'Update permission success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelPermission $modelPermission)
    {
        $modelPermission->delete();
        return redirect()->intended('/admin/permission')->with('message', 'Delete permission success');
    }
}
