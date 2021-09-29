<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about1')->nullable();
            $table->string('about1_detail1', 1000)->nullable();
            $table->string('about1_detail2', 1000)->nullable();
            $table->string('about2')->nullable();
            $table->string('about2_detail1', 1000)->nullable();
            $table->string('about3')->nullable();
            $table->string('about3_detail1', 1000)->nullable();
            $table->string('about3_detail2', 1000)->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
