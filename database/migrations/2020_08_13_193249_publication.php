<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Publication extends Migration
{
    public $tableName = 'publications';
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
            $table->string('title', 200)->comment('Titulo de la publicación');
            $table->text('content')->nullable()->comment('Contenido de la publicación.');            
            $table->unsignedBigInteger('user_id')->comment('Usuario que creó la publicación.');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

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
        Schema::dropIfExists($this->tableName);
    }
}
