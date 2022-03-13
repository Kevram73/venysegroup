<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeUtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_utilisateurs')->insert([
            'utilisateur' => "Admin",
            'description' => "Administrateur du system venyse",
        ]);
        DB::table('type_utilisateurs')->insert([
            'utilisateur' => "Employe",
            'description' => "Un employé de venyse Groupe",
        ]);
        DB::table('type_utilisateurs')->insert([
            'utilisateur' => "trader",
            'description' => "Un trader engage chez Venyse Groupe",
        ]);
    }
}
