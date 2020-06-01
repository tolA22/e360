<?php 

namespace App\Services;

use App\Traits\ResponseTrait;

use App\Repositories\Tank\TankRepository;
use Illuminate\Http\Request;
use App\Services\LocationService;
use App\Services\ActivityLogService;

 
class TankService
{
    use ResponseTrait;

    protected $tank,$locationService,$activityLogService;

	public function __construct(TankRepository $tank,LocationService $locationService,ActivityLogService $activityLogService)
	{
        $this->tank = $tank ;
        $this->locationService = $locationService;
        $this->activityLogService = $activityLogService;
	}


 
    public function create(Request $request)
	{
        
             $attributes = $request->all();
             if(empty($attributes['volume']))
                return $this->error(array("field_error"=>array("volume"=>"volume field is required")),401);

            if(empty($attributes['location_id']))
                return $this->error(array("field_error"=>array("location_id"=>"location id field is required")),401);

             if(empty($this->locationService->find($attributes["location_id"])))
                return $this->error(array("field_error"=>array("location_id"=>"location id field is invalid")),401);

             $model = $this->tank->create($attributes);
             return $this->success($model,"Tank created successfully",200);
	}

 
	public function get($id)
	{
        $model = $this->tank->show($id);
        if(empty($model))
            return $this->error(array("field_error"=>array("id"=>"id field is invalid")),401);

     return $this->success($model,"Tank fetched successfully",200);
	}
 
	public function update(Request $request, $id)
	{
        $attributes = $request->all();

        if(!empty($attributes['location_id'])){
            if(empty($this->locationService->find($attributes["location_id"])))
                return $this->error(array("field_error"=>array("location_id"=>"location id field is invalid")),401);
        }

        $data = $this->tank->show($id);
        if(empty($data))
            return $this->error(array("field_error"=>array("id"=>"id field is invalid")),401);

        $model = $this->tank->update($attributes,$id);
        if(!empty($attributes['volume'])){
            
            $log_data = array('from_tank_id'=>$model->id,'volume'=>$model->volume);
            $this->activityLogService->create($log_data);
        }
            
        return $this->success($model,"Tank updated successfully",200);

	}
 
	public function delete($id)
	{
        $model = $this->tank->show($id);
        if(empty($model))
            return $this->error(array("field_error"=>array("id"=>"id field is invalid")),401);
        $model = $this->tank->delete($id);
     return $this->success($model,"Tank deleted successfully",200);
    }
    
    public function transfer($request){
        $attributes = $request->all();

        if(empty($attributes['amount']))
            return $this->error(array("field_error"=>array("amount"=>"amount field is required")),401);

        if(empty($attributes['source_tank_id']))
            return $this->error(array("field_error"=>array("source_tank_id"=>"source_tank_id field is required")),401);
        
        if(empty($attributes['target_tank_id']))
            return $this->error(array("field_error"=>array("target_tank_id"=>"target_tank_id field is invalid")),401);
        
        if($attributes['target_tank_id'] == $attributes['source_tank_id'])
            return $this->error(array("field_error"=>array("target_tank_id"=>"target_tank_id can't be the same as source_tank_id")),401);
        
        $source_model = $this->tank->show($attributes['source_tank_id']);
        if(empty($source_model))
            return $this->error(array("field_error"=>array("source_tank_id"=>"source_tank_id field is invalid")),401);

        if($source_model->volume - $attributes["amount"] < 0)
            return $this->error(array("field_error"=>array("amount"=>"amount is too large to be transferred")),401);

        $target_model = $this->tank->show($attributes['target_tank_id']);
        if(empty($target_model))
            return $this->error(array("field_error"=>array("target_tank_id"=>"target_tank_id field is invalid")),401);            

        $source_model->volume -= $attributes['amount'];
        $target_model->volume += $attributes['amount'];

        $source_model->save();
        $target_model->save();

        $model = array('source'=>$source_model,'target'=>$target_model);

        $log_data = array('from_tank_id'=>$source_model->id,'to_tank_id'=>$target_model->id,'volume'=>$attributes["amount"]);
        
        
        $this->activityLogService->create($log_data);

        return $this->success($model,"Amount transferred successfully",200);


    }

    public function find($id){
        $model = $this->tank->show($id);
        if(empty($model))
            return false;
        return true;
    }
}