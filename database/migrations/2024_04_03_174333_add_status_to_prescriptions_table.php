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
        Schema::table('prescription_items', function (Blueprint $table) {
            $table->string('start_dose')->nullable();
            $table->integer('has_start_dose')->default(0);
            $table->integer('is_paid')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prescription_items', function (Blueprint $table) {
            //
        });
    }
};
