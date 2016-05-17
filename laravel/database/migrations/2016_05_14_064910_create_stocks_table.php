<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('stocks');

        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date("date");
            $table->String("dealer_id");
            $table->String("register_no");
            $table->String("stock_field");
            $table->integer("total_cost");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
