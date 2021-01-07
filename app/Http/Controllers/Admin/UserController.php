<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        return view('Admin.Users.index');
    }

    private static function validate_data($request , $user)
    {
        $names = [ 'نام کاربری' , 'ایمیل' , 'شماره تلفن' ];
        $errors = [];

        foreach ([ 'username' , 'email' , 'phone' ] as $key => $item)
        {
            if ($request[$item] != $user[$item])
            {
                $data = User::query()->where("$item" , $request[$item])->first();
                if ($data)
                {
                    $errors[$item] = "این $names[$key] قبلا ثبت شده است.";
                }
            }
        }

        if ($errors != [])
        {
            throw ValidationException::withMessages($errors);
        }
    }

    private static function UploadImage($file , $username)
    {
        $year = Carbon::now()->year;
        $mouth = Carbon::now()->month;
        $day = Carbon::now()->day;

        $img_path = "/profile-photos/{$year}-{$mouth}-{$day}/{$username}/";
        $img_name = Str::random(20) . '-' . time() . '-' . $file->getClientOriginalName();

        $file->move(storage_path('app/public' . $img_path) , $img_name);

        return $img_path . $img_name;
    }

    public function create()
    {
        return view('Admin.Users.create');
    }

    public function store(UserRequest $request)
    {
        $request->profile_photo_path = $request->file('profile_photo_path')
            ? self::UploadImage($request->file('profile_photo_path') , $request->username) :  null;

       User::create([
            "name" => $request->name ,
            "email" => $request->email ,
            "password" => Hash::make($request->password) ,
            "username" => $request->username ,
            "lastName" => $request->lastName ,
            "block_status" => $request->block_status?:false ,
            "level" => $request->level ,
            "phone" => $request->phone ,
            "profile_photo_path" => $request->profile_photo_path ,
            "email_verified_at" => $request->active ?  Carbon::now() :  null
        ]);

        \Request::session()->flash('message', "کاربر ($request->username) با موفقیت ثبت شد. ");
        return redirect(route('users.index'));
    }

    public function edit(User $user)
    {
        return view('Admin.Users.edit' , compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        self::validate_data($request , $user);

        $request->profile_photo_path = $request->file('profile_photo_path') ?  self::UploadImage($request->file('profile_photo_path') , $request->username) : $user->profile_photo_path;
        $request->password = $request->password != null ? Hash::make($request->password) : $user->password;

        $user->update([
            "name" => $request->name ,
            "email" => $request->email ,
            "password" => $request->password ,
            "username" => $request->username ,
            "lastName" => $request->lastName ,
            "block_status" => $request->block_status == 1 ?: false ,
            "level" => $request->level ,
            "phone" => $request->phone ,
            "profile_photo_path" => $request->profile_photo_path ,
        ]);

        $user->email_verified_at = $request->active ?  Carbon::now() :  null;  $user->save();

        \Request::session()->flash('message', "کاربر ($request->username) با موفقیت ویرایش شد. ");
        return redirect(route('users.index'));
    }

}
