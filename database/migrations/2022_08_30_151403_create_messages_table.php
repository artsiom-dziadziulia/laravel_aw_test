<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('author');
            $table->text('content');
            $table->timestamps();

            // Indexes
            $table->index('ticket_id', 'messages_tickets_idx');
            $table->index('user_id', 'messages_user_idx');

            // Foreign Keys
            $table->foreign('ticket_id', 'message_tickets_fk')
                ->on('tickets')
                ->references('id');
            $table->foreign('user_id', 'user_user_fk')
                ->on('users')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
