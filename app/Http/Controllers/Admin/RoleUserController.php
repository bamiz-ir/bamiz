<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function index()
    {
        return view('Admin.RoleUsers.index');
    }

    public function create()
    {
        return view('Admin.RoleUsers.create');
    }

    public function store(RoleUserRequest $request)
    {
        $user = User::query()->findOrFail($request->user_id);
        $user->update(['level' => 'admin']);
        $user->syncRoles($request->role_id);

        \Request::session()->flash('message', "مقام های مورد نظر به کاربر ($user->username) با موفقیت اختصاص داده شد. ");
        return redirect(route('roles_users.index'));
    }

    public function edit(User $user)
    {
        return view('Admin.RoleUsers.edit' , compact('user'));
    }

    public function update(RoleUserRequest $request, User $user)
    {
        $user->update(['level' => 'admin']);
        $user->syncRoles($request->role_id);

        \Request::session()->flash('message', "تخصیص مقام های مورد نظر به کاربر ($user->username) با موفقیت ویرایش شد. ");
        return redirect(route('roles_users.index'));
    }
}
