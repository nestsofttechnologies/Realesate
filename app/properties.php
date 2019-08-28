<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class properties extends Model
{
    use Notifiable;
    use SearchableTrait;


    protected $searchable = [
        'columns' => [
            'properties.id' => 100,
            'properties.property_type' => 75,
            'properties.district' => 25,
            'properties.location' => 15,
            'properties.area' => 15,
            
            //'properties.area' <= 15,
            'properties.facility' => 10,
        ]  
    ];
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_type', 'district', 'location', 'property_for','area','facility','property_image',
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
