<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddSlugToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Step 1: Add 'slug' column (temporarily nullable)
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });

        // Step 2: Populate 'slug' for existing records & ensure uniqueness
        DB::table('categories')->get()->each(function ($category) {
            $slug = Str::slug($category->name);
            $originalSlug = $slug;
            $i = 1;

            // Ensure unique slug
            while (DB::table('categories')->where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $i;
                $i++;
            }

            // Update category with unique slug
            DB::table('categories')
                ->where('id', $category->id)
                ->update(['slug' => $slug]);
        });

        // Step 3: Modify 'slug' column to be NOT NULL & UNIQUE
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->string('slug')->nullable()->change();
        });
    }
}
