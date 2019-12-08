<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('order_item', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('order_id');
          $table->unsignedBigInteger('item_id');
          $table->unsignedBigInteger('user_id');
          $table->timestamp('created_at')->useCurrent();
          $table->timestamp('updated_at')->useCurrent();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item');
    }
}
