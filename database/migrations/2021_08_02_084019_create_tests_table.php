<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('test1_name')->nullable();
            $table->string('test1_des')->nullable();
            $table->string('test1_rev', 1000)->nullable();
            $table->string('test2_name')->nullable();
            $table->string('test2_des')->nullable();
            $table->string('test2_rev', 1000)->nullable();
            $table->string('test3_name')->nullable();
            $table->string('test3_des')->nullable();
            $table->string('test3_rev', 1000)->nullable();
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
        Schema::dropIfExists('tests');
    }
}
