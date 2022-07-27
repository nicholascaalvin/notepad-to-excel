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
        Schema::create('users', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('jam')->nullable();
            $table->string('H')->nullable();
            $table->string('IP')->nullable();
            $table->string('P')->nullable();
            $table->string('X')->nullable();
            $table->string('CV')->nullable();
            $table->string('PRX')->nullable();
            $table->string('S')->nullable();
            $table->string('DKIM')->nullable();
            $table->string('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
