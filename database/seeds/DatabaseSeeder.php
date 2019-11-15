<?php

use App\SettingsModel;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i<20;$i++){
            $title = $faker->sentence(2);
            $settings = SettingsModel::create([
                "title"=>$title,
                "detail"=>$faker->sentence(5),
                "email"=>$faker->freeEmail(),
                "logo"=>$faker->url,
            ]);
        }
         $this->call(UserTableSeeder::class);
         $this->call(CategoryTable::class);

    }
}
