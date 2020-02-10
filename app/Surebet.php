<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surebet extends Model
{
    //
    protected $table="surebet";
    protected $fillable=["date","match","team1","team2","odd1","odd2","odd3","bookie1_id","bookie2_id","bookie3_id","percentage"];
}
