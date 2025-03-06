<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddSlugToBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });

        // Populate the 'slug' field for existing records and handle duplicates
        DB::table('brands')->get()->each(function ($brand) {
            $slug = Str::slug($brand->name);
            $originalSlug = $slug;
            $i = 1;

            // Check if the slug already exists, and if it does, append a number to make it unique
            while (DB::table('brands')->where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $i;
                $i++;
            }

            // Update the brand with the unique slug
            DB::table('brands')
                ->where('id', $brand->id)
                ->update(['slug' => $slug]);
        });

        // Modify the 'slug' column to be NOT NULL and UNIQUE
        Schema::table('brands', function (Blueprint $table) {
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
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
