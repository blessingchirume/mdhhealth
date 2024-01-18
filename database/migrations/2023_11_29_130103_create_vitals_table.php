<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vitals', function (Blueprint $table) {
    $table->id();
    $table->string('episode_id');
    $table->string('name');
    $table->string('value');
    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('vitals');
    }
};
