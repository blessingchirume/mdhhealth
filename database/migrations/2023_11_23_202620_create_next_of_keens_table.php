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
        Schema::create('next_of_keens', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('next_of_keen_name');
            $table->string('next_of_keen_surname');
            $table->string('next_of_keen_phone');
            $table->string('next_of_keen_gender');
            $table->string('next_of_keen_national_id');
            $table->string('next_of_keen_address');
            $table->string('next_of_keen_relationship');
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
        Schema::dropIfExists('next_of_keens');
    }
};
