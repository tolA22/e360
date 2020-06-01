<?php 

namespace App\Traits;
 

use Illuminate\Http\Response;
 
trait ResponseTrait
{
	
 
	public function success($data,$message,$code)
	{
		return response()->json([
            'status'=>'Success',
            'message'=>$message,
            'data'=>$data
        ],$code);
	}
 
    public function error($message=null,$code){

        return response()->json([
            'status'=>'error',
            'message'=>$message,
            'data'=>null
        ],$code);
    }
}