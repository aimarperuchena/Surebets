<?php

use Illuminate\Database\Seeder;

class sport_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //1
         DB::table('sport')->insert([
            'name'=>'Futbol'
        ]);
        //2
        DB::table('sport')->insert([
            'name'=>'Tenis'
        ]);

        //3
        DB::table('sport')->insert([
            'name'=>'Baloncesto'
        ]);
        //4
        DB::table('sport')->insert([
            'name'=>'Hockey'
        ]);
    }
}
