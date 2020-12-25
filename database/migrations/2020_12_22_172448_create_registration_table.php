<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20)->unique();
            $table->string('user_type',20);
            $table->string('name',50);
            $table->string('restaurant_name',100)->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number',10);
            $table->string('food_type',15)->nullable();
            $table->string('password',100)->nullable();
            $table->string('login_activity',5)->nullable();
            $table->string('last_ip_address',30);
            $table->string('otp',5);
            $table->string('otp_status',2);
            $table->string('photo')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('registration');
    }
}
