<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLfiFormations extends Migration
{
    public function up()
    {
        Schema::table('lfi_formations_', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->date('start')->nullable()->change();
            $table->date('end')->nullable()->change();
            $table->date('candidate_start')->nullable()->change();
            $table->date('candidate_end')->nullable()->change();
            $table->string('level')->nullable()->change();
            $table->string('time')->nullable()->change();
            $table->string('hours')->nullable()->change();
            $table->string('place')->nullable()->change();
            $table->string('price')->nullable()->change();
            $table->string('subtitle')->nullable()->change();
            $table->text('presentation')->nullable()->change();
            $table->text('condition')->nullable()->change();
            $table->text('prerequis')->nullable()->change();
            $table->text('modalite')->nullable()->change();
            $table->text('vae')->nullable()->change();
            $table->text('evalution')->nullable()->change();
            $table->text('financement')->nullable()->change();
            $table->text('parcours')->nullable()->change();
            $table->text('program')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('lfi_formations_', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->date('start')->nullable(false)->change();
            $table->date('end')->nullable(false)->change();
            $table->date('candidate_start')->nullable(false)->change();
            $table->date('candidate_end')->nullable(false)->change();
            $table->string('level', 255)->nullable(false)->change();
            $table->string('time', 255)->nullable(false)->change();
            $table->string('hours', 255)->nullable(false)->change();
            $table->string('place', 255)->nullable(false)->change();
            $table->string('price', 255)->nullable(false)->change();
            $table->string('subtitle', 255)->nullable(false)->change();
            $table->text('presentation')->nullable(false)->change();
            $table->text('condition')->nullable(false)->change();
            $table->text('prerequis')->nullable(false)->change();
            $table->text('modalite')->nullable(false)->change();
            $table->text('vae')->nullable(false)->change();
            $table->text('evalution')->nullable(false)->change();
            $table->text('financement')->nullable(false)->change();
            $table->text('parcours')->nullable(false)->change();
            $table->text('program')->nullable(false)->change();
        });
    }
}
