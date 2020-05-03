<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
  
            $table->bigInteger('category_id')->unsigned();
  
            $table->bigInteger('stockproductgroup_id')->nullable()->unsigned();
  
            $table->string('name', 128);
            $table->string('slug', 128)->unique();

            $table->bigInteger('img_principal_id')->default(0);

            $table->boolean('web_enable')->default(1);

            $table->text('comentario', 512)->nullable();
  
            //Relationship
            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::dropIfExists('stockproducts');
    }
}
