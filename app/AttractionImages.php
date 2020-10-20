<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionImages extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function attraction(){
        return $this->belongsTo('App\Attraction', 'attraction_id');
    }
}
