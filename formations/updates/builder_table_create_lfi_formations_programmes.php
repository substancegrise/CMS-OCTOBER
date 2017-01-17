<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsProgrammes extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_programmes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('program_title')->nullable();
            $table->string('program_name');
            $table->string('program_short')->nullable();
            $table->text('program_text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_programmes');
    }
}
