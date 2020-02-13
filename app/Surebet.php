<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surebet extends Model
{
    //
    protected $table="surebet";
    protected $fillable=["date","match","team1","team2","odd1","odd2","odd3","bookie1_id","bookie2_id","bookie3_id","percentage"];

    public function bookie1(){
        return $this->belongsTo(Bookie::class,'bookie1_id');
    }
    public function bookie2(){
        return $this->belongsTo(Bookie::class,'bookie2_id');
    }
    public function bookie3(){
        return $this->belongsTo(Bookie::class,'bookie3_id');
    }

   
}
