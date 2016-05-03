<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('serial_number');
            $table->string('item_name');
            $table->integer('unit_cost');
            $table->integer('sale_type'); //should this be changed used in item allocation and creating GP forecast beaware
            $table->integer('owner_id');
            //this should contain a unique item code to identify type of item
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
