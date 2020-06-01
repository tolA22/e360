<?php

use Illuminate\Database\Seeder;

// use App\database\seeds\LocationsTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(TanksTableSeeder::class);
    }
}
