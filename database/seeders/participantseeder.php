<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class participantseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants')->insert([
            'id' => 1,
            'name' => "rizky",
        ]);
        DB::table('participants')->insert([
            'id' => 2,
            'name' => "rizal",
        ]);
        DB::table('participants')->insert([
            'id' => 3,
            'name' => "afri",
        ]);
        DB::table('participants')->insert([
            'id' => 4,
            'name' => "tri",
        ]);
    }
}
