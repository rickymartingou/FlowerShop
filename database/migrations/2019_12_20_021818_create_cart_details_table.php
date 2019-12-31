<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->bigInteger('cart_id')->unsigned();
//            $table->primary('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->bigInteger('flower_id')->unsigned();
//            $table->primary('user_id');
            $table->foreign('flower_id')->references('id')->on('flowers');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_details');
    }
}
