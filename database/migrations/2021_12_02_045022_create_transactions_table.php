<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
          $table->id();
          $table->unsignedBigInteger('poster_id');
          $table->foreign('poster_id')->references('id')->on('house_members');
          $table->unsignedBigInteger('house_id');
          $table->foreign('house_id')->references('id')->on('houses');
          $table->unsignedBigInteger('subcateg_id');
          $table->foreign('subcateg_id')->references('id')->on('trans_subcategories');
          $table->double('amount');
          $table->string('description',255)->nullable();
          $table->string('place',45)->nullable();
          $table->DateTime('date');
          $table->DateTime('due_date')->nullable();
          $table->DateTime('bill_peiod_start')->nullable();
          $table->DateTime('bill_peiod_end')->nullable();
          $table->unsignedTinyInteger('is_active')->default(1);
          $table->string('currency_code',3);
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
        Schema::dropIfExists('transactions');
    }
}
