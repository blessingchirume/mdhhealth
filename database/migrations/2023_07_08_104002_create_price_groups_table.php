<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('price_groups', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->string('package_id');
            $table->string('price');
            // $table->primary(['item_id', 'package_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('price_groups');
    }
};
