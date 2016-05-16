<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UdateFinancialReports1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('financial_reports', function (Blueprint $table) {
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
        Schema::table('financial_reports',function (Blueprint $table) {
            $table->dropColumn('created_by','checked_by','date');
        });
    }
}
