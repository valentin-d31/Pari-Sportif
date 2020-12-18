<?php

use App\User;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $tel = Array([
            "0695847391",
            "0906585687",
            "0596963867",
            "0497567896",
            "0136493746",
            "0185947362",
            "0475943953"
        ]);

        $sport = Array([
            "foot",
            "natation",
            "rugby",
            "handball",
            "athlétisme",
            "escrime"
        ]);

        for ($i = 0; $i < 30; $i++) {
            User::create([
                "name" => $faker->name,
                "email" => $faker->email,
                "age" => $faker->numberBetween(15, 99),
                "adresse" => $faker->text,
                "tel_mobile" => $faker->phoneNumber,
                "tel_fixe" => $faker->phoneNumber,
                "sport_pref" => $faker->word,
                "montant_max" => $faker->randomDigit,
                "password" => $faker->password,
                "admin" => "0"
            ]);
        }
    }
}
