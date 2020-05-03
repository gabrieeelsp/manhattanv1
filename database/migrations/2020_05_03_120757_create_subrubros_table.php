<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubrubrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subrubros', function (Blueprint $table) {
            $table->bigIncrements('id');
  
            $table->bigInteger('rubro_id')->unsigned();
            $table->string('name', 128);
            $table->string('slug', 128)->unique();

            $table->bigInteger('img_principal_id')->default(0);

            $table->boolean('web_enable')->default(1);
  
            //$table->timestamps();
  
            //Relationship
            $table->foreign('rubro_id')->references('id')->on('rubros')
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
        Schema::dropIfExists('subrubros');
    }
}
