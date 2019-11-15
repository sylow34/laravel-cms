<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = "categories";
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany("App\ProductModel","product_category");
    }
}
