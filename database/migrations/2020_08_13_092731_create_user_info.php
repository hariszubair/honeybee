<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('name', 100);
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('date_birth')->nullable();;
            $table->string('street_address')->nullable();;
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postcode')->nullable();
            $table->string('visa_type')->nullable();
            $table->integer('have_car');

            $table->integer('basic_correct');
            $table->integer('looking_job');
            $table->integer('job_changed');
            $table->string('role_apply'); 
            $table->integer('continuous_contact')->default(0);
            
            $table->integer('status')->default(1);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_info');
    }
}
