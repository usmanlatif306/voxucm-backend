<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('intro_title')->nullable();
            $table->string('intro1', 1000)->nullable();
            $table->string('intro2', 1000)->nullable();
            $table->string('intro3', 1000)->nullable();
            $table->string('q1')->nullable();
            $table->string('ans1', 1000)->nullable();
            $table->string('q2')->nullable();
            $table->string('ans2', 1000)->nullable();
            $table->string('q3')->nullable();
            $table->string('ans3', 1000)->nullable();
            $table->string('q4')->nullable();
            $table->string('ans4', 1000)->nullable();
            $table->string('q5')->nullable();
            $table->string('ans5', 1000)->nullable();
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
        Schema::dropIfExists('faqs');
    }
}
