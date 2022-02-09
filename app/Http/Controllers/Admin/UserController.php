<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->cannot('user-list')) {
            abort(403, 'u do not have access');
        }
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
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
    public function edit(User $user)
    {
        if (auth()->user()->cannot('user-edit')) {
            abort(403, 'u do not have access');
        }
        $roles = Role::all();
        $allPermissions = Permission::all();
        return view('admin.users.edit', compact('user', 'roles', 'allPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (auth()->user()->cannot('user-edit')) {
            abort(403, 'u do not have access');
        }
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'roles' => 'required',
        ]);
        $user->update($request->all());
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);
        return redirect()->route('admin.users.index')->with('info', 'User Updated Successfully..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (auth()->user()->cannot('user-edit')) {
            abort(403, 'u do not have access');
        }
        $categuserory->destroy($user->id);
        return redirect()->route('admin.users.index')->with('info', 'User Deleted Successfully');
    }
}
