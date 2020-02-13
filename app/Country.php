<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table="country";
    protected $fillable=["name"];

    public function leagues(){
        return $this->hasMany(League::class);
    }
    public function surebets(){
        return $this->hasMany(Surebet::class);

    }
}
