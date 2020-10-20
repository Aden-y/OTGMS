<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function address(){
        return $this->hasOne('App\Address', 'tourist_id');
    }

    public function bookings(){
        return $this->hasMany('App\Booking', 'tourist_id');
    }


    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
