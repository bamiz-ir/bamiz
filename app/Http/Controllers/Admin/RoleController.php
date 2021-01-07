<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('Admin.Roles.index');
    }

    public function create()
    {
        return view('Admin.Roles.create');
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->syncPermissions($request->permission_id);

        \Request::session()->flash('message', "مقام ($request->name) با موفقیت ثبت شد. ");
        return redirect(route('roles.index'));
    }

    public function edit(Role $role)
    {
        return view('Admin.Roles.edit' , compact('role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->syncPermissions($request->permission_id);

        \Request::session()->flash('message', "مقام ($request->name) با موفقیت ویرایش شد. ");
        return redirect(route('roles.index'));
    }
}
