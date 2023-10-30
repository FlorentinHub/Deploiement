<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    public function up()
{
    Schema::create('projets', function (Blueprint $table) {
        $table->id();
        $table->string('nom_projet');
        $table->string('type_projet');
        $table->integer('complexite');
        $table->integer('pourcentage_complet');
        $table->string('lien_github')->nullable();
        $table->text('description')->nullable();
        $table->string('image_projet')->nullable();
        $table->unsignedBigInteger('collaborateur_id')->nullable();
        $table->foreign('collaborateur_id')->references('id')->on('collaborateurs');
        $table->timestamps();
    });
}



    public function down()
    {
        Schema::dropIfExists('projets');
    }
}
