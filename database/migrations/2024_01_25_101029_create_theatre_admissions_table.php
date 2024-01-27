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
        Schema::create('theatre_admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('episode_id')->constrained('episodes')->cascadeOnDelete();
            $table->foreignId('room')->constrained('theatre_rooms')->cascadeOnDelete();
            $table->string('doctor');
            $table->string('date');
            $table->string('purpose')->nullable();
            $table->string('time_in');
            $table->string('time_out');
            $table->string('status')->default('Pending');
            $table->string('comment')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('theatre_adminssions');
    }
};
