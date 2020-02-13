<?php

namespace App;
use App\League;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $table="sport";
    protected $fillable=["name"];

    public function leagues(){
        return $this->hasMany(League::class);
    }
}
