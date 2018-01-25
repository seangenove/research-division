<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number', '30');
            $table->string('title', '150');
            $table->text('description');
            $table->text('authors');
            $table->date('date_approved_by_council');
            $table->date('date_signed_by_vice_mayor');
            $table->date('date_signed_by_mayor')->nullable();
            $table->tinyInteger('is_monitoring');
            $table->text('pdf_file_path')->nullable();
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
        Schema::dropIfExists('resolutions');
    }
}
