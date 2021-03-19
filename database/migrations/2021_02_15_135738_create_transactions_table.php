<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('uuid')->primary()->unique();
            $table->string('code')->unique();
            $table->double('amount');
            $table->uuid('user_id')->nullable();
            $table->uuid('company_id')->nullable();
            $table->uuid('service_id')->nullable();
            $table->uuid('category_id')->nullable();
            $table->uuid('meter_id')->nullable();
            $table->string('category_code')->nullable();
            $table->string('service_code')->nullable();
            $table->string('currency_code');
            $table->string('destination')->nullable();
            $table->string('paymentaccount')->nullable();
            $table->enum('status', [
                config('business.transaction.status.created'),
                config('business.transaction.status.pending'),
                config('business.transaction.status.processing'),
                config('business.transaction.status.verification'),
                config('business.transaction.status.success'),
                config('business.transaction.status.errored'),
                config('business.transaction.status.failed'),
                config('business.transaction.status.reversed'),
            ])->nullable();
            $table->boolean('to_be_verified')->default(false);
            $table->string('error_code')->nullable();
            $table->string('type')->nullable();
            $table->text('error')->nullable();
            $table->text('message')->nullable();
    
            $table->float('units')->nullable();
            $table->float('price')->nullable();
            $table->string('token')->nullable();
            
            $table->uuid('customer_servicecommission_id')->nullable();
            $table->uuid('price_id')->nullable();
            
            $table->double('system_commission')->nullable();
            
            $table->dateTime('reversed_at')->nullable();
            $table->dateTime('completed_at')->nullable();
    
            $table->string('customer_phone')->nullable();
    
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('user_id')->references('uuid')->on('users');
            $table->foreign('company_id')->references('uuid')->on('companies');
            $table->foreign('meter_id')->references('uuid')->on('meters');
            $table->foreign('service_code')->references('code')->on('services');
            $table->foreign('service_id')->references('uuid')->on('services');
            $table->foreign('category_id')->references('uuid')->on('categories');
            $table->foreign('category_code')->references('code')->on('categories');
            $table->foreign('currency_code')->references('code')->on('currencies');
            $table->foreign('customer_servicecommission_id')->references('uuid')->on('commissions');
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
        Schema::dropIfExists('transactions');
    }
}
