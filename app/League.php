<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Sport;
class League extends Model
{
    protected $table="league";
    protected $fillable=["name","country_id","sport_id"];

    public function sport(){
        return $this->belongsTo(Sport::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
