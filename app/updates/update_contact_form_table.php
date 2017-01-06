<?php namespace LFI\App\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateContactFormTable extends Migration
{
    public function up()
    {
        Schema::table('lfi_app_contact_form', function($table)
        {
            $table->boolean('is_replied')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('lfi_app_contact_form', function($table)
        {
            $table->dropColumn('is_replied');
        });
    }
}
