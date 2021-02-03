<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloohashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloohash', function (Blueprint $table) {
            $table->id();
            $table->string('userName',30)->unique();
            $table->string('firstName',30)->nullable();
            $table->string('lastName',30)->nullable();
            $table->string('add',100)->nullable();
            $table->string('zip_code',6)->nullable();
            $table->string('role',10);
            $table->string('phone',10)->unique();
            $table->string('pass',20);
            $table->string('dataStatus',2);
            $table->string('loginStatus',2);
            $table->string('activityStatus',2);
            $table->string('photo',100)->nullable();
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
        Schema::dropIfExists('bloohash');
    }
}
