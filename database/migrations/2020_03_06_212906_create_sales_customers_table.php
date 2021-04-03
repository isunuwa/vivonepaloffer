<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('full_name',40)->nullable();
            $table->string('contact_no',10)->nullable()->unique();
            $table->string('sold_area',30)->nullable();
            $table->string('shop_name');
            $table->integer('campaign_from_id')->unsigned();
            $table->integer('phone_model_id')->unsigned();
            $table->timestamps();

            $table->foreign('campaign_from_id')->references('id')->on('campaign_froms')->onDelete('cascade');
            // $table->foreign('prize_title_id')->references('id')->on('prize_titles')->onDelete('cascade');
            $table->foreign('phone_model_id')->references('id')->on('phone_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_customers');
    }
}
