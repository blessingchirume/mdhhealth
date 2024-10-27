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
        Schema::create('theatre_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room');
            $table->string('status')->default('Available');//Available, Occupied
            $table->bigInteger('ward_id')->unsigned()->nullable();
            $table->foreign('ward_id')->references('id')->on('wards')->onUpdate('cascade');
            $table->string('comment')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('theatres');
    }
};
