<?php

namespace App\Http\Controllers;

use App\Enums\RolesEnum;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users->load(['roles', 'permissions']);
        $users = $this->user->withoutRole(RolesEnum::ADMIN->value)->with(['roles', 'roles.permissions']) 
            ->get();
        return view('admin.users.index', compact('users'));
    }

    public function assignPermission(User $user)
    {
        $user->load('permissions');
        $permissions = Permission::get();
        return view('admin.users.assign_permission_user', compact(['user', 'permissions']));
    }

    public function savePermissions(Request $request)
    {
        $user  = User::find($request->user_id);
        if (empty($permissions)) {
            // Optionally, you can handle this case differently
            // For example, clear all permissions if no permissions are provided
            $user->syncPermissions([]);
        } else {
            // Sync permissions with the provided list
            $user->syncPermissions($permissions);
        }
        return redirect()->back()->with('success', 'Assign permissioned successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
