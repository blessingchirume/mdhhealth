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
        Schema::create('patient_medical_aid_entries', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('package_id');
            $table->string('suffix_number');
            $table->string('member_name');
            $table->string('policy_number');         
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
        Schema::dropIfExists('patient_medical_aid_entries');
    }
};
