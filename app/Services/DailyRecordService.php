<?php 

namespace App\Services;

use App\Traits\ResponseTrait;

use App\Repositories\DailyRecord\DailyRecordRepository;
use Illuminate\Http\Request;
 
class DailyRecordService
{
    use ResponseTrait;

    protected $dailyRecord;

	public function __construct(DailyRecordRepository $dailyRecord)
	{
		$this->dailyRecord = $dailyRecord ;
	}

    
    public function getAll(){
        $model = $this->dailyRecord->all();
        return $this->success($model,"Daily Record fetched successfully",200);
    }
   
}