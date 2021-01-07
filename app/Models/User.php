<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'username',
        'lastName',
        'block_status',
        'level',
        'phone',
        'profile_photo_path',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin()
    {
       return $this->level == 'admin';
    }

    ////////////////////////////////

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function centers()
    {
        return $this->hasMany(Center::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function wish_lists()
    {
        return $this->hasMany(WishList::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
