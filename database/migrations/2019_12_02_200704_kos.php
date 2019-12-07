<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kos_type',2);
            $table->string('name',255);
            $table->string('owner',255);
            $table->string('contact',255);
            $table->string('alamat');
            $table->text('description');
            $table->integer('image_id');
            $table->integer('length');
            $table->integer('width');
            $table->integer('price');
            $table->integer('bathroom');
            $table->boolean('wifi');
            $table->boolean('ac');
            $table->boolean('food');
            $table->boolean('laundry');
            $table->boolean('tutoring');
            $table->boolean('kitchen');
            $table->boolean('m_parking');
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
        Schema::dropIfExists('kos');
    }
}
