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
        Schema::create('email_source', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('from');
            $table->string('to');
            $table->string('subject');
            $table->string('file');
            $table->bigInteger("created");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_source');
    }
};
