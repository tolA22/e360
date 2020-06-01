<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){
    Route::prefix('location')->group(function(){

        //create
        Route::post('create','LocationController@create');
    
        //update
        Route::put('update/{id}','LocationController@update');
    
        //get
        Route::get('get/{id}','LocationController@get');
    
        //delete
        Route::delete('delete/{id}','LocationController@delete');
    });
    
    Route::prefix('tank')->group(function(){
    
        //create
        Route::post('create','TankController@create');
    
        //update
        Route::put('update/{id}','TankController@update');
    
        //get
        Route::get('get/{id}','TankController@get');
    
        //delete
        Route::delete('delete/{id}','TankController@delete');
    
        //transfer
        Route::post('transfer','TankController@transfer');
    
    });
    
    //get all dailyrecords
    Route::get('dailyrecords','DailyRecordController@getAll');
    
    //get all activitylogs
    Route::get('activitylogs','ActivityLogController@getAll');
});
