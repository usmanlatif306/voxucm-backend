<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoxDidDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vox_did_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained;
            $table->string('subscriber_id');
            $table->string('extension');
            $table->string('extension_username');
            $table->string('did');
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
        Schema::dropIfExists('vox_did_details');
    }
}
