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
        Schema::create('email', function (Blueprint $table) {
            $table->id();
            $table->integer('database_id')->unsigned();
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('host');
            $table->integer('port');
            $table->string('protocol');
            $table->integer('status');
            $table->integer('counter');
            $table->bigInteger('created');
            $table->bigInteger('last_check');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email');
    }
};
