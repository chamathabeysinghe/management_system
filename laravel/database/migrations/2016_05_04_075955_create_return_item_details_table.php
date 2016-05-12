<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_item_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerId')->length(10);
            //$table->foreign('customerId')->references('id')->on('customers');
            $table->integer('itemCode')->length(10);
            //$table->foreign('itemCode')->references('id')->on('items');
            $table->date('date');
            $table->string('remarks');
            $table->string('status');
            $table->integer('repairItemKey')->length(10);
            //$table->foreign('repairItemKey')->references('id')->on('repairitemdetails');
            $table->integer('warrantyItemKey')->length(10);
            //$table->foreign('warrantyItemKey')->references('id')->on('warrantyitemdetails');

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
        Schema::drop('return_item_details');
    }
}
