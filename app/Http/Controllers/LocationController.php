<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Location\CreateLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;
use App\Services\LocationService;

class LocationController extends ApiController
{

    protected $locationService;
    public function __construct(LocationService $locationService){
        $this->locationService = $locationService;
    }
    //
    public function create(CreateLocationRequest $request){
        return $this->locationService->create($request);
    }

    public function update(UpdateLocationRequest $request,$id){
        return $this->locationService->update($request,$id);

    }

    public function get($id){
     
        return $this->locationService->get($id);

    }

    public function delete($id){
        return $this->locationService->delete($id);

    }
}
