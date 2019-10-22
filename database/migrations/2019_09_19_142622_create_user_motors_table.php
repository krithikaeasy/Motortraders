<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_motors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('Table = users, Column = id');
            $table->string('type', 100)->nullable();
            $table->string('manufacture', 100)->nullable();
            $table->string('model_name', 100)->nullable();
            $table->string('reg_number', 100)->nullable();
            $table->float('millage')->nullable()->unsigned();
            $table->string('cc', 100)->nullable();
            $table->year('year')->nullable();
            $table->string('colour', 30)->nullable();
            $table->float('price')->nullable()->unsigned();
            $table->text('description')->nullable();
            $table->timestamps();

            //Set a Relation
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_motors');
    }
}
