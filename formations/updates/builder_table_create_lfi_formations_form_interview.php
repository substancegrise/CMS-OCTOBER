<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormationsFormInterview extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_form_interview', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('formation_id');
            $table->integer('interview_id');
            $table->primary(['formation_id','interview_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_form_interview');
    }
}
