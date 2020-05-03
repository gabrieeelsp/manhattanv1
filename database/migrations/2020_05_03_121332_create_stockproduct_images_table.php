<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockproductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockproduct_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stockproduct_id')->unsigned();

            $table->string('name', 128);
            $table->integer('posicion');
            
            
            //$table->timestamps();

            //Relationship
            $table->foreign('stockproduct_id')->references('id')->on('stockproducts')
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
        Schema::dropIfExists('stockproduct_images');
    }
}
