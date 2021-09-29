<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisoner_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('prison_fname');
            $table->string('prison_lname');
            $table->string('prison_number');
            $table->string('prison_status')->nullable();
            $table->string('release_date')->nullable();
            $table->string('prison');
            $table->string('prison_relation');
            $table->string('prison_contact');
            $table->string('prison_contact_name');
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
        Schema::dropIfExists('prisoner_details');
    }
}
