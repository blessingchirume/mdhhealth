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
        //
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('test');
            $table->string('episode');
            $table->string('result')->nullable();
            $table->date('test_date')->nullable();
            $table->time('test_time')->nullable();
            $table->text('comment')->nullable();
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->unsignedBigInteger('refered_by');
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
