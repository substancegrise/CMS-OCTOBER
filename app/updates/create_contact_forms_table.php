<?php namespace Lfi\App\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateContactFormsTable extends Migration
{
    public function up()
    {
        Schema::create('lfi_app_contact_forms', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->enum('function', ['futur eleve', 'curieux', 'professionnel']);
            $table->enum('subject', ['information', 'prise de contact', 'postuler']);
            $table->longText('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lfi_app_contact_forms');
    }
}
