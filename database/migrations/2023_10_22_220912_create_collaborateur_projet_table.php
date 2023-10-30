<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaborateurProjetTable extends Migration
{
    public function up()
    {
        Schema::create('collaborateur_projet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collaborateur_id');
            $table->unsignedBigInteger('projet_id');
            $table->timestamps();

            $table->foreign('collaborateur_id')->references('id')->on('collaborateurs');
            $table->foreign('projet_id')->references('id')->on('projets');
        });
    }

    public function down()
    {
        Schema::dropIfExists('collaborateur_projet');
    }
}
