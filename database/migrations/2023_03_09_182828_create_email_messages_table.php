<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('email_messages', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->timestamps('created_at');
            $table->string('from');
            $table->string('to');
            $table->string('cc')->nullable();
            $table->string('ip');
            $table->string('user_agent');
        });
    }

    public function down()
    {
        Schema::dropIfExists('email_messages');
    }
}
