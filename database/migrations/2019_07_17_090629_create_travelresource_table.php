<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelresourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelresource', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('资源id');
            $table->integer('classid')->unsigned()->comment('顶级分类id');
            $table->integer('lxid')->unsigned()->comment('类型id');
            $table->string('name','50')->comment('资源名称');
            $table->string('site','50')->comment('位置')->nullable();
            $table->string('des','255')->comment('描述')->nullable();
            $table->string('imgs','255')->comment('图片')->nullable();
            $table->string('price','10')->comment('价格')->nullable();
            $table->integer('status')->unsigned()->comment('状态')->default('0');
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
        Schema::dropIfExists('travelresource');
    }
}
