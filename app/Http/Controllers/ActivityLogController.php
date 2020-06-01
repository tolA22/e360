<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Services\ActivityLogService;

class ActivityLogController extends ApiController
{

    protected $activityLogService;
    public function __construct(ActivityLogService $activityLogService){
        $this->activityLogService = $activityLogService;
    }


    public function getAll(){
     
        return $this->activityLogService->getAll();

    }

}
