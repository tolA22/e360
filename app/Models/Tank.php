<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    //
    protected $fillable = array("volume","location_id","created_at","updated_at");


    public function location(){
        return $this->belongsTo('App\Models\Location');
    }
}
