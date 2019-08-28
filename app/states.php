<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class states extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];
}
