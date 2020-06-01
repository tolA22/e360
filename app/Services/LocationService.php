<?php 

namespace App\Services;

use App\Traits\ResponseTrait;

use App\Repositories\Location\LocationRepository;
use Illuminate\Http\Request;
 
class LocationService
{
    use ResponseTrait;

    protected $location;

	public function __construct(LocationRepository $location)
	{
		$this->location = $location ;
	}
 

 
    public function create(Request $request)
	{
        
             $attributes = $request->all();
             if(empty($attributes['name']))
                return $this->error(array("field_error"=>array("name"=>"name field is required")),401);
             $model = $this->location->create($attributes);
             return $this->success($model,"Location created successfully",200);
	}

 
	public function get($id)
	{
        $model = $this->location->show($id);
        if(empty($model))
            return $this->error(array("field_error"=>array("id"=>"id field is invalid")),401);

     return $this->success($model,"Location fetched successfully",200);
	}
 
	public function update(Request $request, $id)
	{
        $attributes = $request->all();
        if(empty($attributes['name']))
            return $this->error(array("field_error"=>array("name"=>"name field is required")),401);
      

        $data = $this->location->show($id);
        if(empty($data))
            return $this->error(array("field_error"=>array("id"=>"id field is invalid")),401);

        $model = $this->location->update($attributes,$id);
        
        return $this->success($model,"Location updated successfully",200);

	}
 
	public function delete($id)
	{
        $model = $this->location->show($id);
        if(empty($model))
            return $this->error(array("field_error"=>array("id"=>"id field is invalid")),401);
        $model = $this->location->delete($id);
     return $this->success($model,"Location deleted successfully",200);
    }
    
    public function find($id){
        $model = $this->location->show($id);
        if(empty($model))
            return false;
        return true;
    }
}