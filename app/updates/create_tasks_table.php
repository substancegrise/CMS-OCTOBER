<?php namespace Lfi\App\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('lfi_app_tasks', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titre')->nullable();
            $table->boolean('fait')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lfi_app_tasks');
    }
}
