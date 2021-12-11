<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiabilityPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liability_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('liability_id');
            $table->foreign('liability_id')->references('id')->on('transaction_liabilities');
            $table->double('amount');
            $table->DateTime('payment_date');
            $table->unsignedTinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('liability_payments');
    }
}
