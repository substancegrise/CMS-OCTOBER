<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLfiFormations2 extends Migration
{
    public function up()
    {
        Schema::table('lfi_formations_', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('lfi_formations_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
