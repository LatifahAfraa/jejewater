<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username' , 'password', 'password_text', 'role', 'nama'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table ='user';

    protected $primaryKey ='id_user';
}
