<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('project_status');
            $table->integer('duration');
            $table->string('title');
            $table->string('location');
            $table->string('incharge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects',function (Blueprint $table) {
            $table->dropColumn('project_status');
            $table->dropColumn('duration','title','location','incharge');
        });
    }
}
