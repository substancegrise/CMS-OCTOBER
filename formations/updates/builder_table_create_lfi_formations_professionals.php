<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsProfessionals extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_professionals', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('profes_title')->nullable();
            $table->string('profes_name');
            $table->string('profes_short')->nullable();
            $table->text('profes_text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_professionals');
    }
}
