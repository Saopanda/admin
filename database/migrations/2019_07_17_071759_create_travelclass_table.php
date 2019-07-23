<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelclassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelclass', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name','10')->comment('分类名称');
            $table->string('icon','20')->nullable()->comment('图标');
            $table->integer('classid')->unsigned()->comment('上级分类id');
            $table->integer('status')->unsigned()->comment('状态')->default('1');
            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('travelclass');
    }
}
