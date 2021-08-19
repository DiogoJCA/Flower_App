<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Using query builder
        DB::table('flowers')->insert([
            'name' => 'Rose',
            'price' => '10'
        ]);
        DB::table('flowers')->insert([
            'name' => 'Tulip',
            'price' => '5'
        ]);
        DB::table('flowers')->insert([
            'name' => 'Orchid',
            'price' => '25'
        ]);
       
    }
}
