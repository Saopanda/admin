<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelgoods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name','150');
            $table->string('banner','150');
            $table->date('start_date');
            $table->integer('days')->unsigned();
            $table->string('price')->default('0');
            $table->string('price_sel')->default('0');
            $table->integer('status')->unsigned()->default('1');
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
        Schema::dropIfExists('travelgoods');
    }
}
