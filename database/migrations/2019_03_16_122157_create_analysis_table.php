<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis', function (Blueprint $table) {
            $table->increments('id');
            $table->text("url")->nullable();
            $table->text("r_manquante_arr")->nullable();
            $table->text("r_links")->nullable();
            $table->text("nb_r_broken")->nullable();
            $table->mediumtext("urls")->nullable();
            $table->text("tmoyen")->nullable();
            $table->text("prof")->nullable();
            $table->text("tdep")->nullable();
            $table->text("loading_time")->nullable();
            $table->text("load_time")->nullable();
            $table->text("broken_link")->nullable();
            $table->text("syntaxe_errors")->nullable();
            $table->text("internal_links")->nullable();
            $table->text("external_links")->nullable();
            $table->text("nb_broken")->nullable();
            $table->text("nb_broken404")->nullable();
            $table->text("analyse_synt")->nullable();
            $table->text("op_images")->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('analysis');
    }
}
