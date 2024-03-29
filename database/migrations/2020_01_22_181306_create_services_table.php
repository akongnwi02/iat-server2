<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('destination_placeholder')->nullable();
            $table->string('destination_regex')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('logo_url')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();
            $table->uuid('category_id');
            $table->uuid('providercompany_id')->nullable();
            $table->uuid('providercommission_id')->nullable();
            $table->uuid('customercommission_id')->nullable();
            $table->double('min_amount')->default(0);
            $table->double('step_amount')->default(1);
            $table->double('max_amount')->default(1000000);
            $table->double('company_rate')->nullable();
            $table->double('agent_rate')->nullable();
            $table->double('external_rate')->nullable();
            $table->boolean('is_public')->nullable();
            $table->string('auth_type')->nullable();
            $table->double('requires_auth')->default(false);
            $table->double('is_money_withdrawal')->default(false);
            $table->boolean('has_items')->default(false);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
    
            $table->foreign('category_id')->references('uuid')->on('categories');
            $table->foreign('providercommission_id')->references('uuid')->on('commissions');
            $table->foreign('customercommission_id')->references('uuid')->on('commissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
