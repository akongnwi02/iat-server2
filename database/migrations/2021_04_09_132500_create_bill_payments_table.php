<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_payments', function (Blueprint $table) {
            $table->uuid('uuid')->primary()->unique();
            $table->uuid('cycle_id');
            $table->uuid('supply_point_id');
            $table->float('amount');
            $table->string('payment_ref')->nullable();
            $table->boolean('is_confirmed')->default(false);
            $table->enum('type', ['water', 'electricity', 'cable']);
            $table->enum('method', ['money_transfer', 'bill_settlement'])->nullable();
            $table->string('consumption')->nullable();
            $table->string('bill_number')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
    
            $table->foreign('cycle_id')->references('uuid')->on('cycles');
            $table->foreign('supply_point_id')->references('uuid')->on('supply_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_payments');
    }
}
