<?php

use App\CategoryModel;
use Illuminate\Database\Seeder;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<20;$i++){
            $title = $faker->sentence(2);
            $category = CategoryModel::create([
                "title"=>$title,
                "detail"=>$faker->sentence(5),
        /*        "user_id"=>function (){
                 return \App\User::all()->random();
                },*/
                "slug"=>str_slug($title),
                "img"=>$faker->url,
            ]);
        }

        //şu sekıldede yapabılırsın factory dosyasında oluşturup yukardakı gıbı burda cagırabılırsın
       // factory(App\User::class, 50)->create();


    }
}
