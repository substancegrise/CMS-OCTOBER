<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsDay extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_day', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('day_title1')->nullable();
            $table->string('day_title2')->nullable();
            $table->string('day_speaker')->nullable();
            $table->text('day_texte')->nullable();
            $table->string('day_number')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_day');
    }
}
