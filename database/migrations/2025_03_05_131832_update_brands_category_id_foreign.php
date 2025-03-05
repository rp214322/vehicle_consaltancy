<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBrandsCategoryIdForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            // Change category_id to unsigned
            $table->unsignedBigInteger('category_id')->change();

            // Add foreign key constraint
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
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
            // Drop the foreign key
            $table->dropForeign(['category_id']);

            // Revert category_id to signed (optional, adjust if needed)
            $table->bigInteger('category_id')->change();
        });
    }
}
