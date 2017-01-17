<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsCategory extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('formation_category');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_category');
    }
}
