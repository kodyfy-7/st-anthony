<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title')->nullable();
            $table->string('full_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('home_address')->nullable();
            $table->string('birthday')->nullable();
            $table->string('mobile_number')->nullable();
            $table->unsignedBigInteger('station_id')->nullable();
            $table->foreign('station_id')->references('id')->on('stations');
            $table->string('baptism_name')->nullable();
            $table->string('baptism_place')->nullable();
            $table->string('baptism_date')->nullable();
            $table->string('baptism_number')->nullable();
            $table->string('baptism_minister')->nullable();
            $table->string('communion_place')->nullable();
            $table->string('communion_date')->nullable();
            $table->string('communion_minister')->nullable();
            $table->string('confirmation_place')->nullable();
            $table->string('confirmation_date')->nullable();
            $table->string('confirmation_name')->nullable();
            $table->string('confirmation_minister')->nullable();
            $table->string('marriage_place')->nullable();
            $table->string('marriage_date')->nullable();
            $table->string('marriage_spouse')->nullable();
            $table->string('maiden_name')->nullable();
            $table->string('marriage_minister')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->integer('profile_status')->default(0);
            $table->string('profile_slug');
            $table->softDeletes();
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
        Schema::dropIfExists('profiles');
    }
}
