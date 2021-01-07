<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    private static function CreateUser($user)
    {
        return  User::query()->create([
            'username' => $user->getNickname() ?: $user->getId(),
            'email' => $user->getEmail(),
            'password' => Hash::make($user->getId()),
            'name' => $user->getName(),
            'lastName' => $user['family_name'],
        ]);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $user = User::query()->whereEmail($user->getEmail())->first()  ?:  self::CreateUser($user);
        $user->update(['email_verified_at' => Carbon::now()]);

        auth()->loginUsingId($user->id);
        return redirect(route('dashboard'));
    }
}
