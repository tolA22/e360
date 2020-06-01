<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TankTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $data = ['location_id' => 1,"volume"=>240];
        $response = $this->post('api/v1/tank/create',$data);
        // dd($response);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Tank created successfully"]);
        $response->assertJson(['data' => ["location_id"=>1,"volume"=>240]]);
    }

    public function testUpdate()
    {
        $data = ['volume' => "400"];
        $response = $this->put('api/v1/tank/update/2',$data);
        // dd($response);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Tank updated successfully"]);
        $response->assertJson(['data' => ["id"=>2]]);
    }

    public function testGet()
    {
        $response = $this->get('api/v1/tank/get/2');
        // dd($response);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Tank fetched successfully"]);
        $response->assertJson(['data' => ["id"=>2]]);
    }

    public function testDelete()
    {
        $response = $this->delete('api/v1/tank/delete/1');
        // dd($response);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Tank deleted successfully"]);
        // $response->assertJson(['data' => ["id"=>1]]);
    }

    public function testTransfer(){
        $data = ['source_tank_id' => 2,"target_tank_id"=>3,"amount"=>40];
        $response = $this->post('api/v1/tank/transfer',$data);
        // dd($response);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Amount transferred successfully"]);
        $response->assertJson(['data' => ["amount"=>40]]);
    }
}
