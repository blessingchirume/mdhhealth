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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('episode_code');
            $table->string('episode_entry');
            $table->string('patient_id');
            $table->string('patient_type');
            $table->string('date');
            $table->unsignedBigInteger('payment_option_id')->unsigned()->nullable();
            $table->string('attendee');
            $table->double('base_amount')->default(0.00);
            $table->double('amount_due')->default(0.00);
            $table->string('ward');
            $table->timestamps();

            $table->foreign('payment_option_id')->references('id')->on('payment_options')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
};
