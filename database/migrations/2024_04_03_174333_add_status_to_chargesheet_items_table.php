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
        Schema::table('chargesheet_items', function (Blueprint $table) {
            $table->enum('status',['Pending','Paid'])->default('Pending');
            $table->integer('is_consultation_fee')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chargesheet_items', function (Blueprint $table) {
            //
        });
    }
};
