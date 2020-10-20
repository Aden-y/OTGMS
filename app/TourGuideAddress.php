<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourGuideAddress extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function guide(){
        return $this->belongsTo('App\TourGuide','guide_id');
    }
}
