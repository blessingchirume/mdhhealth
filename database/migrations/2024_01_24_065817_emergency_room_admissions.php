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
        Schema::create('emergency_room_admimissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->integer('episode_id')->nullable();
            $table->string('gender')->nullable();
            $table->longText('medical_history')->nullable();
            $table->string('status')->default('Pending');
            $table->string('admit_to')->default('Waiting Room');//Waiting Room, Ward, Theatre, ICU, Martenity
            $table->string('type')->default('In-Patient'); // Out-Patient, In-Patient
            $table->unsignedBigInteger('created_by')->nullable();
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
        Schema::dropIfExists('emergency_room_admimissions');
    }
};
