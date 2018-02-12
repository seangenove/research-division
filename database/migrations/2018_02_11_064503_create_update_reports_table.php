<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->text('pdf_file_name')->nullable();
            $table->text('pdf_file_path')->nullable();
            $table->integer('ordinance_id')->unsigned()->nullable();
            $table->integer('resolution_id')->unsigned()->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::table('update_reports', function($table) {
            $table->foreign('ordinance_id')->references('id')->on('ordinances');
            $table->foreign('resolution_id')->references('id')->on('resolutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_reports');
    }
}
