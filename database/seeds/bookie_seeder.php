<?php

use Illuminate\Database\Seeder;

class bookie_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('bookie')->insert([
            'name'=>'Bet 365'
        ]);
        //2
        DB::table('bookie')->insert([
            'name'=>'Codere'
        ]);
        //3
        DB::table('bookie')->insert([
            'name'=>'Bwin'
        ]);
        //4
        DB::table('bookie')->insert([
            'name'=>'Marathon Bet'
        ]);
        //5
        DB::table('bookie')->insert([
            'name'=>'Luckia'
        ]);
        //6
        DB::table('bookie')->insert([
            'name'=>'Sportium'
        ]);
        //7
        DB::table('bookie')->insert([
            'name'=>'Betway'
        ]);
        //8
        DB::table('bookie')->insert([
            'name'=>'Marca Apuestas'
        ]);
        //9
        DB::table('bookie')->insert([
            'name'=>'William Hill'
        ]);
        //10
        DB::table('bookie')->insert([
            'name'=>'888 Sport'
        ]);
        //11
        DB::table('bookie')->insert([
            'name'=>'Betfair'
        ]);
        //12
        DB::table('bookie')->insert([
            'name'=>'Interwetten'
        ]);
    }
}
