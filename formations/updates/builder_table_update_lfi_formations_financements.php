<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLfiFormationsFinancements extends Migration
{
    public function up()
    {
        Schema::table('lfi_formations_financements', function($table)
        {
            $table->increments('id')->change();
        });
    }
    
    public function down()
    {
        Schema::table('lfi_formations_financements', function($table)
        {
            $table->integer('id')->change();
        });
    }
}
