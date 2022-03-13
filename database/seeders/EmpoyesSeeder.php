<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpoyesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'first_name' => "AGBODJAN",
            'last_name' => "EDOE JUNIOR",
            'nationality' => "Togolaise",
            'email' => "kelyjuniora@gmail.com",
            'phone_number' => "+22893413484",
            'country' => "TOGO",
            'town'=> "Lome",
            'born_day' => "1999-10-09",
            'address' => "Adidogome",
            'annees_experience' => 5,
            'photoId_url'=> Str::random(15),
            'certificatResidence_url'=> Str::random(15),
            'level'=> 1,
            'password' => Hash::make('password'),
        ]);
    }
}
