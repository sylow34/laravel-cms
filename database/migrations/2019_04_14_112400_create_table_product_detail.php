<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("product_id")->unsigned()->unique();
            $table->integer("show_slider")->default('0');
            $table->integer("show_opportunity_of_day")->default('0');
            $table->integer("show_best_seller")->default('0');
            $table->integer("show_discount")->default('0');
            $table->string("image",50)->nullable();
            $table->timestamps();

            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detail');
    }
}
