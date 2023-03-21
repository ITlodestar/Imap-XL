<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_task', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('database_id');
            $table->integer('task_type');
            $table->text('task_body');
            $table->integer('status');
            $table->bigInteger('timestart');
            $table->string('uuid');
            $table->bigInteger('timefinish')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
