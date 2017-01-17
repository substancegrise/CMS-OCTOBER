<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLfiFormations extends Migration
{
    public function up()
    {
        Schema::create('lfi_formations_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->date('start');
            $table->date('end');
            $table->date('candidate_start');
            $table->date('candidate_end');
            $table->string('level');
            $table->string('time');
            $table->string('hours');
            $table->string('place');
            $table->string('price');
            $table->string('subtitle');
            $table->text('presentation');
            $table->text('condition');
            $table->text('prerequis');
            $table->text('modalite');
            $table->text('vae');
            $table->text('evalution');
            $table->text('financement');
            $table->text('parcours');
            $table->text('program');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_formations_');
    }
}
