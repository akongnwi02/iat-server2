<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meters', function (Blueprint $table) {
            $table->uuid('uuid')->primary()->unique();
            $table->string('identifier')->nullable();
            $table->uuid('supply_point_id')->nullable();
            $table->uuid('provider_id');
            $table->string('meter_code')->unique();
            $table->enum('type', ['water', 'electricity']);
            $table->boolean('is_active')->default(1);
            $table->text('blocked_reason')->nullable();
            $table->dateTime('last_vending_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
    
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
    
            $table->foreign('supply_point_id')->references('uuid')->on('supply_points');
            $table->foreign('provider_id')->references('uuid')->on('providers');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meters');
    }
}
