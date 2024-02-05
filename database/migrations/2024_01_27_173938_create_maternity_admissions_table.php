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
        Schema::create('maternity_admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admission_id');
            $table->string('gestational_age')->nullable();
            $table->string('estimated_delivery_date')->nullable();
            $table->string('prenatal_care_provider')->nullable();
            $table->string('status')->default('active');//active,discharged
            $table->string('date');

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
        Schema::dropIfExists('martenities');
    }
};
