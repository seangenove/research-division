<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdinanceSuggestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordinance_suggestion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordinance_id')->unsigned();
            $table->foreign('ordinance_id')->references('id')->on('ordinances');
            $table->integer('suggestion_id')->unsigned();
            $table->foreign('suggestion_id')->references('id')->on('suggestions');
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
        Schema::dropIfExists('ordinance_suggestion');
    }
}
