<?php

//Route::get('/',"Admin\Settings\IndexController@index")->name("admin.index");

/*Route::group(['namespace'=>"Admin","prefix"=>"admin","as"=>"admin."],function (){
    Route::group(['namespace' => 'Product',"as"=>"product."], function () {
        Route::get("/product/create","IndexController@create")->name("create");
    });
});*/
Auth::routes();
Route::group(['namespace' => "Frontend", "prefix" => "/"], function () {
    Route::group(['namespace' => 'Home'], function () {
        Route::resource("/", "IndexController");
    });
});

Route::group(['prefix' => 'admin', "namespace" => "Admin", "middleware" => ["auth"]], function () {

    Route::group(['namespace' => 'Settings'], function () {
        Route::resource("settings", "IndexController");
    });
    //
    Route::group(["namespace" => "Product"], function () {
        Route::resource("product", "IndexController");
         Route::post('/product',"IndexController@index")->name("product.search");
         Route::post('/store',"IndexController@store")->name("product.store");
    });

    Route::group(["namespace" => "Category"], function () {
        Route::resource("category", "IndexController");
    });
});
Route::get("/home","\App\Http\Controllers\Frontend\Home\IndexController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
