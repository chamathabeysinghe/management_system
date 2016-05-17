<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SaveResetPasswords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->String("email");
            $table->String("old_email");
            $table->String("serial_no");
            $table->String("unit_price");
            $table->integer("quantity");
            $table->integer("total_cost");
            $table->integer("dealer_id");
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
