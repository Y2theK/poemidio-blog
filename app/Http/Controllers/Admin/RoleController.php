<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->cannot('role-list')) {
            abort(403, 'u do not have access');
        }
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
        if (auth()->user()->cannot('user-create')) {
            abort(403, 'u do not have access');
        }
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
        if (auth()->user()->cannot('user-create')) {
            abort(403, 'u do not have access');
        }
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
        if (auth()->user()->cannot('user-list')) {
            abort(403, 'u do not have access');
        }
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
        $user = auth()->user();
        // if (!$user->hasPermissionTo('role-edit')) {
        //     abort(403, 'U Dont Have Access');
        // }

        if (! $user->can('role-edit')) {
            abort(403, 'U Dont Have Access');
        }
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
        if (auth()->user()->cannot('user-edit')) {
            abort(403, 'u do not have access');
        }
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
        if (auth()->user()->cannot('user-delete')) {
            abort(403, 'u do not have access');
        }
        return abort(403, 'Working in Progress');
    }
}
