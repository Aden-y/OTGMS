<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    public function tourist(){
        return $this->belongsTo('App\Tourist', 'tourist_id');
    }
}
