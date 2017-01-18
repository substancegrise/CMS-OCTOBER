<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsInterviews extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_interviews', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('function');
            $table->string('society');
            $table->string('line')->nullable();
            $table->text('presentation');
            $table->string('link')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('viadeo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('instagram')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_interviews');
    }
}
