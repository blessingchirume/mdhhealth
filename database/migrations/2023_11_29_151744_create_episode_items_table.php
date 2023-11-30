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
        Schema::create('episode_items', function (Blueprint $table) {
            $table->unsignedBiginteger('item_id')->unsigned();
            $table->unsignedBiginteger('episode_id')->unsigned();
            $table->integer('quantity')->default(0);
            $table->foreign('item_id')->references('id')
                 ->on('items')->onDelete('cascade');
            $table->foreign('episode_id')->references('id')
                ->on('episodes')->onDelete('cascade');

            $table->primary(['item_id', 'episode_id']);
                
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
        Schema::dropIfExists('episode_items');
    }
};
