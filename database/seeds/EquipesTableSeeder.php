<?php

use App\Equipe;
use Illuminate\Database\Seeder;

class EquipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*avec truncate on va supprimer les anciennes données
        existante avant de seed notre bdd*/
        Equipe::truncate();

        Equipe::create(['name' => 'Toulouse']);
        Equipe::create(['name' => 'Paris']);
        Equipe::create(['name' => 'Lyon']);
        Equipe::create(['name' => 'Bordeaux']);
        Equipe::create(['name' => 'Lille']);
        Equipe::create(['name' => 'Montepellier']);
    }
}
