<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nationality');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('country');
            $table->string('town');
            $table->date('born_day');
            $table->text('address');
            $table->string('annees_experience');
            $table->string('photoId_url');
            $table->string('certificatResidence_url')->nullable();
            $table->string('level');
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
        Schema::dropIfExists('employees');
    }
}
