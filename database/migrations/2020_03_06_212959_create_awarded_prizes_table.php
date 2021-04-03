<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardedPrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awarded_prizes', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->date('date')->nullable();
            $table->integer('sales_customer_id')->unsigned();
            $table->integer('prize_title_id')->unsigned();
            $table->timestamps();

            
            $table->foreign('sales_customer_id')->references('id')->on('sales_customers')->onDelete('cascade');
            // do not delete prize title on deletion of winner
            $table->foreign('prize_title_id')->references('id')->on('prize_titles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awarded_prizes');
    }
}
