<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_inventories', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('quote_id');
            $table->uuid('inventory_id');
            $table->timestamps();
            
            $table->unique(['quote_id', 'inventory_id']);
    
            $table->foreign('quote_id')->references('uuid')->on('quotes');
            $table->foreign('inventory_id')->references('uuid')->on('inventories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_inventories');
    }
}
