<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsFormDay extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_form_day', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('formation_id')->unsigned();
            $table->integer('day_id')->unsigned();
            $table->primary(['formation_id','day_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_form_day');
    }
}
