<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarrantyItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty_item_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string("wcnNo");
            $table->date("wcnIssueDate");
            $table->date("receivedDate");
            $table->string("wrnNo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('warranty_item_details');
    }
}
