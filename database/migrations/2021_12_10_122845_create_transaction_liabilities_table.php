<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionLiabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_liabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payer_id');
            $table->foreign('payer_id')->references('id')->on('house_member');
            $table->unsignedBigInteger('payee_id');
            $table->foreign('payee_id')->references('id')->on('house_member');
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->double('amount');
            $table->unsignedTinyInteger('is_paid')->default(0);
            $table->DateTime('date_paid');
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
        Schema::dropIfExists('transaction_liabilities');
    }
}
