<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Services\DailyRecordService;

class DailyRecordController extends ApiController
{

    protected $dailyRecordService;
    public function __construct(DailyRecordService $dailyRecordService){
        $this->dailyRecordService = $dailyRecordService;
    }


    public function getAll(){
     
        return $this->dailyRecordService->getAll();

    }

}
