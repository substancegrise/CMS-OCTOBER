<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLfiFormationsProgrammes extends Migration
{
    public function up()
    {
        Schema::table('lfi_formations_programmes', function($table)
        {
            $table->string('program_name', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('lfi_formations_programmes', function($table)
        {
            $table->string('program_name', 255)->nullable(false)->change();
        });
    }
}
