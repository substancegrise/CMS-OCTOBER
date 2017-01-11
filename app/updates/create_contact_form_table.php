<?php namespace LFI\App\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateContactformTable extends Migration
{
    public function up()
    {
        Schema::create('lfi_app_contact_form', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('subject');
            $table->text('message')->nullable();
            $table->string('function');
            $table->boolean('is_new')->default(1);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lfi_app_contact_form');
    }
}
