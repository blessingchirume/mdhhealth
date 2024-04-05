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
        Schema::create('prescription_items', function (Blueprint $table) {
            $table->id();
            $table->integer('prescription_id');
            $table->integer('item_id');
            $table->string('dosage');
            $table->string('frequency')->comment('1/1-Once a day, 2/1-Twice a day, 3/1-thrice a day, 4/1-four times a day e.t.c');
            $table->string('duration')->comment('days in numbers, 1wk=7days, 2wk=14days');
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
        Schema::dropIfExists('prescription_items');
    }
};
