<?php

use Illuminate\Database\Seeder;
use App\Models\Location;
class LocationsTableSeeder extends Seeder
{

    protected $locations = ["ikeja","agege","maryland","yaba"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->locations as $location){
            $model = new Location();
            $model->name = $location;
            $model->save();
        }
    }
}
