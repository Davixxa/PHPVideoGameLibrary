<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Support\Facades\Hash;


class User extends AuthenticatableUser
{
    use Notifiable, AuthenticatableTrait;

    protected $table = 'users';
    protected $fillable = [
        'username', 'password', 'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser() {
        return $this->role === 'user';
    }
}
