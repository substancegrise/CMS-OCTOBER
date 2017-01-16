<?php namespace LFI\App\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateFormationsTable extends Migration
{
    public function up()
    {
        Schema::create('lfi_app_formations', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lfi_app_formations');
    }
}
