<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLfiFormationsProfessionals extends Migration
{
    public function up()
    {
        Schema::table('lfi_formations_professionals', function($table)
        {
            $table->string('profes_name', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('lfi_formations_professionals', function($table)
        {
            $table->string('profes_name', 255)->nullable(false)->change();
        });
    }
}
