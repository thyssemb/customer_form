<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternautesTable extends Migration
{
    public function up()
    {
        Schema::create('internautes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->string('password');
            $table->date('birthday');
            $table->string('picture')->nullable();
            $table->string('number')->unique();
            $table->string('email')->unique();
            $table->string('mailing_address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('internautes');
    }
}
