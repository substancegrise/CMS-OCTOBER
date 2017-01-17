<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLfiFormationsFormationsCategory extends Migration
{
    public function up()
    {
        Schema::dropIfExists('lfi_formations_formations_category');
    }
    
    public function down()
    {
        Schema::create('lfi_formations_formations_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('formation_id');
            $table->integer('category_id');
        });
    }
}
