<?php namespace Lfi\App\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTremasTable extends Migration
{
    public function up()
    {
        Schema::create('lfi_app_tremas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->enum('categorie', ['diplomante', 'formante', 'certifiante']);
            $table->text('content');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lfi_app_tremas');
    }
}
