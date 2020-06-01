<?php 

namespace App\Services;

use App\Traits\ResponseTrait;

use App\Repositories\ActivityLog\ActivityLogRepository;
use Illuminate\Http\Request;
 
class ActivityLogService
{
    use ResponseTrait;

    protected $activityLog;

	public function __construct(ActivityLogRepository $activityLog)
	{
        $this->activityLog = $activityLog ;
	}
 

 
    public function create($request)
	{
        
             $attributes = $request;
             if(empty($attributes['from_tank_id']))
                return $this->error(array("field_error"=>array("from_tank_id"=>"from_tank_id field is required")),401);

            //  if(empty($attributes['to_tank_id']))
            //     return $this->error(array("field_error"=>array("to_tank_id"=>"to_tank_id field is required")),401);

            if(empty($attributes['volume']))
                return $this->error(array("field_error"=>array("volume"=>"volume field is required")),401);
            
             $model = $this->activityLog->create($attributes);
             return $this->success($model,"ActivityLog created successfully",200);
	}

 
	public function get($id)
	{
        $model = $this->activityLog->show($id);
        if(empty($model))
            return $this->error(array("field_error"=>array("id"=>"id field is invalid")),401);

     return $this->success($model,"ActivityLog fetched successfully",200);
	}
 
	public function update(Request $request, $id)
	{
     

	}
 
	public function delete($id)
	{
        $model = $this->activityLog->show($id);
        if(empty($model))
            return $this->error(array("field_error"=>array("id"=>"id field is invalid")),401);
        $model = $this->activityLog->delete($id);
     return $this->success($model,"ActivityLog deleted successfully",200);
    }
    
    public function find($id){  
        $model = $this->activityLog->show($id);
        if(empty($model))
            return false;
        return true;
    }

    public function getAll(){
        $model = $this->activityLog->all();
        return $this->success($model,"Activity Log fetched successfully",200);
    }
}