<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTechnicianAllocationsTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('technician_allocations', function (Blueprint $table) {
            $table->float('commission');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('technician_allocations',function (Blueprint $table) {
            $table->dropColumn('commission');
        });
    }
}
