<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->integer('installation');
            $table->integer('timeliness');
            $table->integer('quality');
            $table->integer('personnel');
            $table->integer('overall_service');
            $table->integer('service_needs');
            $table->integer('price');
            $table->integer('recommendation');

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
        Schema::table('feedbacks',function (Blueprint $table) {
            $table->dropColumn('installation','timeliness','quality','personnel','overall_service','service_needs','price','recommendation');
        });
    }
}
