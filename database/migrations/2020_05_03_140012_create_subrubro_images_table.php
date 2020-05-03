<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubrubroImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subrubro_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subrubro_id')->unsigned();

            $table->string('name', 128);
            $table->integer('posicion');
            
            //$table->timestamps();

            //Relationship
            $table->foreign('subrubro_id')->references('id')->on('subrubros')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subrubro_images');
    }
}
