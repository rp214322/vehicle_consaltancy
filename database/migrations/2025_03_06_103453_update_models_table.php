<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class UpdateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('models', function (Blueprint $table) {
            // Change brand_id to unsigned
            $table->unsignedBigInteger('brand_id')->change();

            // Add soft deletes column
            $table->softDeletes();

            // Add foreign key constraint
            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands')
                  ->onDelete('cascade');
        });

        // Modify the 'status' column using a raw SQL query
        DB::statement("ALTER TABLE models MODIFY COLUMN status TINYINT(1) DEFAULT 1");

        // Add the slug column separately
        Schema::table('models', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });

        // Populate the 'slug' field for existing records and handle duplicates
        DB::table('models')->get()->each(function ($model) {
            $slug = Str::slug($model->name);
            $originalSlug = $slug;
            $i = 1;

            // Check if the slug already exists, and if it does, append a number to make it unique
            while (DB::table('models')->where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $i;
                $i++;
            }

            // Update the model with the unique slug
            DB::table('models')
                ->where('id', $model->id)
                ->update(['slug' => $slug]);
        });

        // Modify the 'slug' column to be NOT NULL and UNIQUE in the brands table
        Schema::table('models', function (Blueprint $table) {
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
        Schema::table('models', function (Blueprint $table) {
            // Revert status column to BOOLEAN using raw SQL
            DB::statement("ALTER TABLE models MODIFY COLUMN status BOOLEAN");

            $table->dropSoftDeletes(); // Remove soft deletes
            $table->dropForeign(['brand_id']); // Drop the foreign key
            $table->dropColumn('slug');
        });
    }
}
