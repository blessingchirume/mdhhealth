<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chargesheet_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('item_id')->unsigned()->nullable();
            $table->unsignedBiginteger('charge_sheet_id')->unsigned();
            $table->foreign('item_id')->references('id')
                 ->on('items')->onDelete('set null');
            $table->decimal('quantity', 10, 2)->default(1.00);
            $table->foreign('charge_sheet_id')->references('id')
                ->on('charge_sheets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chargesheet_items');
    }
};
