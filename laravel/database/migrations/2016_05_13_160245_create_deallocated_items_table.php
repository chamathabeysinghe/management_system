<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeallocatedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deallocated_items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('serial_number');
            $table->string('item_name');
            $table->integer('return_state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deallocated_items');
    }
}
