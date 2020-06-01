<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $data = ['name' => "Oworonshoki12"];
        $response = $this->post('api/v1/location/create',$data);
        // dd($response);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Location created successfully"]);
        $response->assertJson(['data' => ["name"=>"Oworonshoki12"]]);
    }

    public function testUpdate()
    {
        $data = ['name' => "Oworo1122"];
        $response = $this->put('api/v1/location/update/4',$data);
        // dd($response);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Location updated successfully"]);
        // $response->assertJson(['data' => ["id"=>1]]);
    }

    public function testGet()
    {
        $response = $this->get('api/v1/location/get/4');
        // dd($response);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Location fetched successfully"]);
        $response->assertJson(['data' => ["id"=>1]]);
    }

    public function testDelete()
    {
        $response = $this->delete('api/v1/location/delete/1');
        // dd($response);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Location deleted successfully"]);
        // $response->assertJson(['data' => ["id"=>1]]);
    }


}
