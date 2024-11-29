<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColetasTable extends Migration
{
    public function up()
    {
        Schema::create('coletas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_remetente');
            $table->string('endereco_coleta');
            $table->text('descricao_mercadoria');
            $table->float('largura');
            $table->float('comprimento');
            $table->float('altura');
            $table->float('peso');
            $table->date('data_coleta');
            $table->time('hora_coleta');
            $table->unsignedBigInteger('transportadora_id');
            $table->foreign('transportadora_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coletas');
    }
}
