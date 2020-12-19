<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->default('backend/image/default.png');
            $table->unsignedBigInteger('depertment_id')->nullable();
            $table->tinyInteger('age')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->tinyInteger('blood_group')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('depertment_id')->references('id')->on('depertments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
