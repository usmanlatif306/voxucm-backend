<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('user_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->foreignId('product_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->boolean('order_status')->default(0);
            // $table->boolean('payment_status')->default(0);
            // $table->timestamp('expiry_date')->default(Carbon::now()->addMonth());
            // $table->timestamps();
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('product_id')->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('did_id')->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->string('price');
            $table->string('order_status')->default('Unpaid');
            $table->string('payment_id')->nullable();
            $table->timestamp('invoiced')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
