<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sapatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('number_id');
            $table->unsignedBigInteger('color_id');
     
            $table->string('nome')->unique();
            $table->string('modelo');
            $table->string('descricao');
            $table->decimal('preco', 10, 2);

            $table->foreign('number_id')->references('id')->on('numbers');
            $table->foreign('color_id')->references('id')->on('colors');

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
        Schema::dropIfExists('sapatos');
    }
}
