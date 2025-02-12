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
            $table->enum('role', ['admin', 'customer'])->default('customer');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('slug')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->string('image')->nullable(); // Added image field
            $table->date('dob')->nullable(); // Added date of birth field
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('country')->nullable(); // Country
            $table->string('state')->nullable(); // State
            $table->text('address')->nullable(); // Address
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
