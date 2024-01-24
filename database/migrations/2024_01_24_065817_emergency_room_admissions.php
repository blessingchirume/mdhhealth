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
            $table->integer('episode')->nullable();
            $table->string('gender')->nullable();
            $table->string('medical_history')->nullable();
            $table->string('status')->default('Pending');
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
        //
    }
};
