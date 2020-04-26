<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChansonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chanson', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('url');
            $table->string('style');
            $table->string('image')->default('/uploads/default/default-music.png');
            $table->integer("utilisateur_id");
            $table->foreign('utilisateur_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            // Crée le Updtate et le Created
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chanson');
    }
}
