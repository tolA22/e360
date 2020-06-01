<?php
use App\Models\DailyRecord;
use App\Models\Tank;
use App\Models\ActivityLog;


function takeDailyRecords(){

    foreach (Tank::cursor() as $tank){
        $data = array("tank_id"=>$tank->id,"volume"=>$tank->volume);
        DailyRecord::create($data);
    }
}

function logTransfer($data){
    ActivityLog::create($data);
}



