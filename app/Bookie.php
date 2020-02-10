<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookie extends Model
{
    protected $table="bookie";
    protected $fillable=["id","name"];

    public function surebets()
    {
        return $this->hasMany(Surebet::class);
    }
}
