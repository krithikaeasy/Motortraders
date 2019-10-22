<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('motor_id')->comment('Table = user_motors, Column = id');
            $table->string('url', 255);
            $table->string('caption', 100)->nullable();
            $table->unsignedInteger('size')->nullable();
            $table->string('mine_type', 100)->nullable();
            $table->timestamps();

            //Set a Relation
            $table->foreign('motor_id')->references('id')->on('user_motors')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motor_images');
    }
}
