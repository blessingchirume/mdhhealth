<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('national_id');
            $table->string('name');
            $table->string('surname');
            $table->string('dob');
            $table->string('gender');
            $table->string('phone');
            $table->string('address');
            $table->string('email')->nullable();
            // $table->string('medical_aid_member_name')->nullable();
            // $table->string('medical_aid_provider')->nullable();          
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
        Schema::dropIfExists('patients');
    }
};
