<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct(Role $role)
    {
        $this->middleware('permission:role-list', ['only' => ['index','show']]);

        $this->middleware('permission:role-create', ['only' => ['create','store']]);

        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:role-delete', ['only' => ['destory']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $roles = Role::with('permissions')->get();
        
        // dd($roles->permissions);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(403, 'Working in Progress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(403, 'Working in Progress');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(403, 'Working in Progress');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $allPermissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'allPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        return abort(403, 'Working in Progress');
        // return dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(403, 'Working in Progress');
    }
}
