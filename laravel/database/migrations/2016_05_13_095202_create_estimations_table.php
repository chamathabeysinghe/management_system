<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('estimation_date');
            $table->string('client_name');
            $table->string('client_address');
            $table->string('client_email');
            $table->string('client_tel');
            $table->string('estimation_amount');
            $table->string('estimation_status');
            $table->string('estimation_record_list');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estimations');
    }
}
