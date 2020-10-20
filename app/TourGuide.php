<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function address(){
        return $this->hasOne('App\TourGuideAddress', 'guide_id');
    }
}
