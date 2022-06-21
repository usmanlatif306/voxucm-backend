<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('address')->nullable()->after('user_id');
            $table->string('city')->nullable()->after('address');
            $table->string('country')->nullable()->after('city');
            $table->string('postcode')->nullable()->after('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            //
        });
    }
}
