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
        Schema::create('gurantors', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->string('gender');
            $table->string('national_id');
            $table->string('address');
            $table->string('relationship');
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
        Schema::dropIfExists('gurantors');
    }
};
