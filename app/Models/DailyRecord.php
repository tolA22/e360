<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyRecord extends Model
{
    //
    protected $fillable = array("tank_id","volume","created_at","updated_at");
   
}
