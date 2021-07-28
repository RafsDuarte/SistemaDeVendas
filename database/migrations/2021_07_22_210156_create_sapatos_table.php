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
     
            $table->string('nome');
            $table->string('modelo');
            $table->integer('numeracao');
            $table->string('cor');
            $table->string('descricao');
            $table->decimal('preco', 10, 2);


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
