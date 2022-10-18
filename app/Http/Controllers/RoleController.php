<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', Role::class)){
            return redirectNotAuthorized('/dashboard');
        }
        
        return view('roles.index', [
            'title' => "Roles",
            'roles' => Role::where('id', '!=', $request->user()->role_id)->without('permissions')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Role::class)){
            return redirectNotAuthorized('/roles');
        }

        return view('roles.create', [
            'title' => 'Create Role',
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Role::class)){
            return redirectNotAuthorized('/roles');
        }

        $validated = $request->validate([
            'name' => 'string|required',
        ]);

        $input = $request->collect()->except(['_token', 'name'])->keys();

        $newRoles = Role::create($validated);
        $newRoles->permissions()->attach($input->all());

        return redirectWithAlert('roles', 'success', 'Role Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Role $role)
    {
        if ($request->user()->cannot('view', $role)){
            return redirectNotAuthorized('/roles');
        }
        return view('roles.show', [
            'title' => "Role Info",
            'role' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Role $role)
    {
        if ($request->user()->cannot('update', $role)){
            return redirectNotAuthorized('/roles');
        }

        return view('roles.edit', [
            'title' => 'Edit Role',
            'role' => $role,
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if ($request->user()->cannot('update', $role)){
            return redirectNotAuthorized('/roles');
        }

        if ($request->name != $role->name){
            $validated = $request->validate([
                'name' => 'string|required'
            ]);

            $role->update($validated);
        }
        
        $input = $request->collect()->except(['_token', 'name', '_method'])->keys();
        $role->permissions()->sync($input);

        return redirectWithAlert('roles', 'success', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Role $role)
    {
        if ($request->user()->cannot('delete', $role)){
            return redirectNotAuthorized('/roles');
        }

        $role->permissions()->detach();
        $role->delete();

        return redirectWithAlert('/role', 'success', 'Role Deleted Successfully');
    }
}
