<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
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
            $table->unsignedBigInteger("from"); // de quem veio a mensagem
            $table->unsignedBigInteger("to"); // para quem vai a mensagem
            $table->text('content'); // conteudo
            $table->timestamps();

            $table->foreign("from")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("to")->references("id")->on("users")->onDelete("cascade");
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
}
