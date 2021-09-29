<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_head_1')->nullable();
            $table->string('service_detail_1', 1000)->nullable();
            $table->string('service_head_2')->nullable();
            $table->string('service_detail_2', 1000)->nullable();
            $table->string('ser_head_1')->nullable();
            $table->string('ser_detail_1', 1000)->nullable();
            $table->string('ser_head_2')->nullable();
            $table->string('ser_detail_2', 1000)->nullable();
            $table->string('ser_head_3')->nullable();
            $table->string('ser_detail_3', 1000)->nullable();
            $table->string('ser_head_4')->nullable();
            $table->string('ser_detail_4', 1000)->nullable();
            $table->string('ser_head_5')->nullable();
            $table->string('ser_detail_5', 1000)->nullable();
            $table->string('ser_head_6')->nullable();
            $table->string('ser_detail_6', 1000)->nullable();
            $table->string('ser_head_7')->nullable();
            $table->string('ser_detail_7', 1000)->nullable();
            $table->string('service_head_2_head1')->nullable();
            $table->string('service_detail_2_detail1', 1000)->nullable();
            $table->string('service_head_2_head2')->nullable();
            $table->string('service_detail_2_detail2', 1000)->nullable();
            $table->string('image')->nullable();
            $table->string('image1')->nullable();
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
        Schema::dropIfExists('services');
    }
}
