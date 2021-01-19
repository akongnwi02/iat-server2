<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplyPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_points', function (Blueprint $table) {
            $table->uuid('uuid')->primary()->unique();
            $table->string('name')->unique();
            $table->string('area')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('contract_number')->nullable();
            
            $table->boolean('is_auto_price')->default(false);
            $table->float('auto_price')->nullable();
            $table->float('auto_price_margin')->nullable();
            $table->float('provider_price')->nullable();
    
            $table->float('gps_long')->nullable();
            $table->float('gps_lat')->nullable();
            $table->uuid('service_charge_id')->nullable();
            $table->uuid('price_id')->nullable();
    
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
    
            $table->foreign('service_charge_id')->references('uuid')->on('commissions');
            $table->foreign('price_id')->references('uuid')->on('prices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supply_points');
    }
}
