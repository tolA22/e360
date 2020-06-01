<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityLog extends Model
{
    //
    protected $fillable = array("from_tank_id","to_tank_id","volume","action","created_at","updated_at");
   
}
