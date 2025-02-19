<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddMissingFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add slug as a nullable field first (to avoid unique constraint errors)
            $table->string('slug')->nullable()->after('last_name');
        });

        // Set default unique values for existing records
        DB::statement("UPDATE users SET slug = CONCAT('user-', id) WHERE slug IS NULL OR slug = ''");

        // Now enforce uniqueness
        Schema::table('users', function (Blueprint $table) {
            $table->unique('slug');
        });

        // Continue adding other columns
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob')->nullable()->after('password');
            $table->string('country')->nullable()->after('dob');
            $table->string('state')->nullable()->after('country');
            $table->text('address')->nullable()->after('state');
            $table->string('image')->nullable()->after('address');
            $table->tinyInteger('status')->default(1)->after('image');
            $table->softDeletes()->after('remember_token');
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
            $table->dropUnique('users_slug_unique');
            $table->dropColumn(['slug', 'dob', 'country', 'state', 'address', 'image', 'status', 'deleted_at']);
        });
    }
}
