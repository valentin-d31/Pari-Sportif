<?php

use Illuminate\Database\Seeder;

class ParisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Pari', 5)->create();
    }
}
