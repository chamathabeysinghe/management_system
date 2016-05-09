<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGPForecastTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('g_p_forecasts', function (Blueprint $table) {
            $table->float('profit');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('g_p_forecasts',function (Blueprint $table) {
            $table->dropColumn('profit');
        });
    }
}
