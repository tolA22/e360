<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Location extends Model
{
    //
    protected $fillable = array("name","created_at","updated_at");

    public function tanks(){
        return $this->hasMany('App\Models\Tank');
    }
}

