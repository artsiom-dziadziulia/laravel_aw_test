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
        Schema::create('server_credentials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('message_id');
            $table->string('ftp_login');
            $table->string('ftp_password');
            $table->timestamps();
            $table->index('message_id', 'server_credentials_message_idx');

            // Foreign Keys
            $table->foreign('message_id', 'server_credentials_messages_fk')
                ->on('messages')
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
        Schema::dropIfExists('server_credentials');
    }
};
