<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class facilities extends Model
{
    use Notifiable;
    use SearchableTrait;



    protected $searchable = [
        'columns' => [
            'facilities.id' => 100,
            'facilities.facility_name' => 75,
            'facilities.bedroom' => 25,
            'facilities.bathroom' => 15,
            'facilities.furnished' => 10,
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'facility_name', 'bedroom', 'bathroom', 'furnished',
    ];


     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at',
    ];
}
