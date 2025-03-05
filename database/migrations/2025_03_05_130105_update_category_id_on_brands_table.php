<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateCategoryIdOnBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string("image")->nullable()->after("name"); // Add image column

            // Change status type to tinyInteger manually
            DB::statement('ALTER TABLE brands MODIFY COLUMN status TINYINT(1) NOT NULL DEFAULT 1');

            $table->softDeletes(); // Add soft delete column
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
            $table->dropColumn("image");

            // Revert status to boolean manually
            DB::statement('ALTER TABLE brands MODIFY COLUMN status BOOLEAN NOT NULL');

            $table->dropSoftDeletes();
        });
    }
}
