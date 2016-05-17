<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->String("register_no");
            $table->date("date");
            $table->String("first_name");
            $table->String("last_name");
            $table->String("email");
            $table->String("telephone_no");
            $table->String("address");
            $table->String("conditions");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dealers');
    }
}
