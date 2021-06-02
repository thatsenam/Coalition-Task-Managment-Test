<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('project_id')->unsigned()->nullable()->index();
            $table->string('name', 255)->nullable();
            $table->string('description', 1000)->nullable();
            $table->boolean('is_completed')->nullable();
            $table->string('priority')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
