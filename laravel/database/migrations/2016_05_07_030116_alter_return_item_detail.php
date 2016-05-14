<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterReturnItemDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('return_item_details', function ($table) {
            $table->dropColumn('customerId');
            $table->dropColumn('itemCode');
            $table->dropColumn('repairItemKey');
            $table->dropColumn('warrantyItemKey');
            $table->string('job_type');

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
