<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => "rizky",
            'password' => Hash::make('1234567890')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => "rizal",
            'password' => Hash::make('1234567890')
        ]);
    }
}
