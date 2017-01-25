<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsPartners extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_partners', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_partners');
    }
}
