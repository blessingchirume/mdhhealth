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
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->string('episode_id');
            $table->string('user_id');
            $table->string('origin');
            $table->string('observation')->nullable();
            $table->string('complaints')->nullable();;
            $table->string('complaints_history')->nullable();;
            $table->string('notes')->nullable();;
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
