<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          // Tạo bảng products có các trường sau:
          //id, category_id, name, price, description, status
          //created_at, updated_at
          $table->increments('id');
          $table->integer('category_id');
          $table->string('name', 150);
          $table->integer('price');
          $table->text('description');
          $table->tinyInteger('status');
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
        Schema::dropIfExists('products');
    }
}
