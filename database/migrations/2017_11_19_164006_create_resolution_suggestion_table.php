<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResolutionSuggestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolution_suggestion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('resolution_id')->unsigned();
            $table->foreign('resolution_id')->references('id')->on('resolutions');
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
        Schema::dropIfExists('resolution_suggestion');
    }
}
