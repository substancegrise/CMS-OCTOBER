<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsFormProfes extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_form_profes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('formation_id')->unsigned();
            $table->integer('profes_id')->unsigned();
            $table->primary(['formation_id','profes_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_form_profes');
    }
}
