<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    protected $table = "settings";
    protected $guarded = [];

    public function getEmailAttribute($value){
        return $value . " gokhan";
    }

    public function getGokhanAttribute(){
        return  " gokhan yener ";
    }
}
