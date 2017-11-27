<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('prestamo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkUsuario')->unsigned();
            $table->integer('fkLibro')->unsigned();
            $table->timestamps();
            $table->foreign('fkUsuario')->references('id')->on('users');
            $table->foreign('fkLibro')->references('id')->on('libro');
        });    
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('prestamo');  
    }
}
