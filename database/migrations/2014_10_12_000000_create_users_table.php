<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    /**
     * status du profile utilisateur:
     * 0-> profile incomplet
     * 1-> profile complet
     *
     * status du compte 3phases disponibles
     * 0-> compte en phase test
     * 1-> compte a test reussi
     * 2-> compte a test non reussi
     */
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenoms');
            $table->string('sexe');
            $table->string('telephone_1');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('profile_status')->default(0); //status du profile soit complet ou incomplet
            $table->integer('compte_status')->default(0);  //status du compte soit en phase test- test reussi - test echoue
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('telephone_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
