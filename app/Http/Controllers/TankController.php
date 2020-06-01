<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Tank\CreateTankRequest;
use App\Http\Requests\Tank\UpdateTankRequest;
use App\Http\Requests\Tank\TransferTankRequest;
use App\Services\TankService;

class TankController extends ApiController
{

    protected $tankService;

    public function __construct(TankService $tankService){
        $this->tankService = $tankService;
    }
    //
    public function create(CreateTankRequest $request){
        return $this->tankService->create($request);
    }

    public function update(UpdateTankRequest $request,$id){
        return $this->tankService->update($request,$id);

    }

    public function get($id){
     
        return $this->tankService->get($id);

    }

    public function delete($id){
        return $this->tankService->delete($id);

    }

    public function transfer(TransferTankRequest $request){
        return $this->tankService->transfer($request);
    }
}
