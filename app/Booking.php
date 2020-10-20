<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];
    public function guide(){
        return $this->belongsTo('App\TourGuide', 'guide_id');
    }

    public function tourist(){
        return $this->belongsTo('App\Tourist', 'tourist_id');
    }

    public function attraction(){
        return $this->belongsTo('App\Attraction', 'attraction_id');
    }
}
