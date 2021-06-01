<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('details', 1000)->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->integer('category_id')->unsigned()->nullable()->index();
            $table->string('price')->nullable();
            $table->boolean('is_offer')->nullable();
            $table->boolean('is_special')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('food');
    }
}
