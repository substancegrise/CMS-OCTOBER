<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsFormProgram extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_form_program', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('formation_id');
            $table->integer('program_id');
            $table->primary(['formation_id','program_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_form_program');
    }
}
