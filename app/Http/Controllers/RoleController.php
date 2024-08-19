<?php

namespace App\Http\Controllers;

use App\Enums\RolesEnum;
use App\Models\Permission;
use App\Models\Role as ModelRole;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{

    protected $modelRole;
    /**
     * Create a new controller instance.
     */
    public function __construct(ModelRole $modelRole)
    {
        $this->modelRole = $modelRole;
    }

    public function assignPermission(ModelRole $role)
    {
        $permissions = Permission::get();
        $role = Role::findById($role->id);
        // Load permissions assigned to the role
        $role->load('permissions');
        return view('admin.roles.assign_permission', compact('role', 'permissions'));
    }

    public function savePermissions(Request $request)
    {
        // Retrieve the role by its ID
        $currentRole = Role::findById($request->role_id);
        // Synchronize the permissions: 
        // Assign the selected permissions and remove any that were not selected.
        $currentRole->givePermissionTo($request->input('permissions'));
        return redirect()->back()->with('success', 'Assign permissioned successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::whereNot('name', RolesEnum::ADMIN->value)->get();
        $roles->load('permissions');
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
        $existed = $this->modelRole->where('name', $request->name)->exists();
        if ($existed) {
            return redirect()->back()->withErrors(['error' => 'This role already exists.']);
        }
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
    public function edit(ModelRole $role)
    {
        return view('admin.roles.edit_role', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelRole $role)
    {
        $role->name = $request->name;
        $role->save();
        return redirect('/admin')->with('message', 'Edit role done.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelRole $role)
    {
        $role->delete();
        return redirect('/admin')->with('message', 'Delete role done.');
    }
}
