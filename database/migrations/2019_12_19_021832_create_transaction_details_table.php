<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->bigInteger('transaction_id')->unsigned();
//            $table->primary('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->bigInteger('flower_id')->unsigned();
//            $table->primary('flower_id');
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
        Schema::dropIfExists('transaction_details');
    }
}
