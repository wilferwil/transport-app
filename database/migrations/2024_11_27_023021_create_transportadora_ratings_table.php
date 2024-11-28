<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportadoraRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('transportadora_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendedor_id');
            $table->unsignedBigInteger('transportadora_id');
            $table->tinyInteger('nota')->unsigned()->min(1)->max(5); // Rating from 1 to 5
            $table->text('comentario')->nullable();
            $table->timestamps();

            $table->foreign('vendedor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transportadora_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transportadora_ratings');
    }
}
