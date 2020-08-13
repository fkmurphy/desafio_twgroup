<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    public $tableName = 'comments';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->comment('Identificador unico y autoincremental de la tabla');
            $table->integer('status')->comment('Estado del comentario');
            $table->text('content')->nullable()->comment('Contenido del comentario.');            
            $table->unsignedBigInteger('publication_id')->comment('A qué publicación pertenece.');

            $table->foreign('publication_id')
                ->references('id')->on('publications')
                ->onDelete('no action')
                ->onUpdate('no action');
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
