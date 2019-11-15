<?php

use App\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();

        $admin= User::create([
            'name'     => 'Gökhan Yener',
            'email'       => 'gkhnyener@gmail.com',
            'password'       => bcrypt('123456'),
            'privilege' => 1
        ]);

        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                 'name'     => $faker->name,
                 'email'       => $faker->unique()->safeEmail,
                 'password'       => bcrypt('123456'),
                 'privilege' => 0
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
