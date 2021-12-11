<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReminderMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminder_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reminder_id');
            $table->foreign('reminder_id')->references('reminders')->on('id');
            $table->unsignedBigInteger('house_member_id');
            $table->foreign('house_member_id')->references('house_members')->on('id');
            $table->unsignedTinyInteger('is_visible')->default(0);
            $table->unsignedTinyInteger('can_edit')->default(0);
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
        Schema::dropIfExists('reminder_members');
    }
}
