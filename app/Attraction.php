<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $guarded = [];
    
    public function address(){
        return $this->hasOne('App\AttractionAddress', 'attraction_id');
    }

    public function images()
    {
        return $this->hasMany('App\AttractionImages', 'attraction_id');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking', 'attraction_id');
    }
}
