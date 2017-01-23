<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsFinancements extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_financements', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id')->unsigned();
            $table->string('title');
            $table->text('finance_txt');
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_financements');
    }
}
