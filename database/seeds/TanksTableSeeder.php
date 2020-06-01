<?php

use Illuminate\Database\Seeder;
use App\Models\Tank;


class TanksTableSeeder extends Seeder
{

    protected $data = array(array("location_id"=>1,"volume"=>300),array("location_id"=>1,"volume"=>200),array("location_id"=>2,"volume"=>250),array("location_id"=>3,"volume"=>100),array("location_id"=>4,"volume"=>50),array("location_id"=>3,"volume"=>600));
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->data as $datum){
            $model = new Tank();
            $model->location_id = $datum["location_id"];
            $model->volume = $datum["volume"];
            $model->save();
        }
    }
}
