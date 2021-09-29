<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_letters', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('descrip', 500)->nullable();
            $table->string('ser1')->nullable();
            $table->string('ser1_count')->nullable();
            $table->string('ser2')->nullable();
            $table->string('ser2_count')->nullable();
            $table->string('ser3')->nullable();
            $table->string('ser3_count')->nullable();
            $table->string('ser4')->nullable();
            $table->string('ser4_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_letters');
    }
}
