<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('routes')->nullable();
            $table->string('redirect')->nullable();
            $table->string('voice_mail')->nullable();
            $table->string('sip_address')->nullable();
            $table->boolean('is_route')->default(0);
            $table->boolean('is_redirect')->default(0);
            $table->boolean('is_voice_mail')->default(0);
            $table->boolean('is_sip')->default(0);
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
        Schema::dropIfExists('purchase_details');
    }
}
