<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientinfos', function (Blueprint $table) {
            $table->string('cId');
            $table->increments('adId');
            $table->string('image');
            $table->string('category');
            $table->string('link');
            $table->integer('vCount')->nullable();
            $table->integer('cCount')->nullable();
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
        Schema::dropIfExists('clientinfos');
    }
}
