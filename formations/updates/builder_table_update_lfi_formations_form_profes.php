<?php namespace Lfi\Formations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLfiFormationsFormProfes extends Migration
{
    public function up()
    {
        Schema::table('lfi_formations_form_profes', function($table)
        {
            $table->dropPrimary(['formation_id','profes_id']);
            $table->renameColumn('profes_id', 'professional_id');
            $table->primary(['formation_id','professional_id']);
        });
    }
    
    public function down()
    {
        Schema::table('lfi_formations_form_profes', function($table)
        {
            $table->dropPrimary(['formation_id','professional_id']);
            $table->renameColumn('professional_id', 'profes_id');
            $table->primary(['formation_id','profes_id']);
        });
    }
}
