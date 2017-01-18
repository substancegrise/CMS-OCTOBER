<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLfiFormationsFormProgram extends Migration
{
    public function up()
    {
        Schema::table('lfi_formations_form_program', function($table)
        {
            $table->integer('formation_id')->unsigned()->change();
            $table->integer('program_id')->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('lfi_formations_form_program', function($table)
        {
            $table->integer('formation_id')->unsigned(false)->change();
            $table->integer('program_id')->unsigned(false)->change();
        });
    }
}
