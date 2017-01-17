<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsFormCateg extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_form_categ', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('formation_id');
            $table->integer('category_id');
            $table->primary(['formation_id','category_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_form_categ');
    }
}
