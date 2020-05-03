<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
  
            $table->bigInteger('subrubro_id')->unsigned();
            $table->string('name', 128);
            $table->string('slug', 128)->unique();

            $table->bigInteger('img_principal_id')->default(0);

            $table->boolean('web_enable')->default(1);
  
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
        Schema::dropIfExists('categories');
    }
}
