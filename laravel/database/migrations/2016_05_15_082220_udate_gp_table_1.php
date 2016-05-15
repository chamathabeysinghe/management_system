<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UdateGpTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('g_p_forecasts', function (Blueprint $table) {
            $table->string('crated_by');
            $table->string('checked_by');
            $table->date('date');
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
        Schema::table('g_p_forecasts',function (Blueprint $table) {
            $table->dropColumn('created_by','checked_by','date');
        });
    }
}
