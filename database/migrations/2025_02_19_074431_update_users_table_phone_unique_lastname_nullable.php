<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTablePhoneUniqueLastnameNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Make last_name nullable
            $table->string('last_name')->nullable()->change();

            // Add unique constraint to phone number
            $table->unique('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert last_name to non-nullable (if needed)
            $table->string('last_name')->nullable(false)->change();

            // Remove unique constraint from phone number
            $table->dropUnique('users_phone_unique');
        });
    }
}
