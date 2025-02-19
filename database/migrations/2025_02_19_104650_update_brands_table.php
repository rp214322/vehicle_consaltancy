<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            // Add new columns
            $table->string('slug')->unique()->after('name');
            $table->string('image')->nullable()->after('slug');
            $table->tinyInteger('status')->default(1)->change(); // Update status column
            $table->softDeletes(); // Add soft deletes

            // Update category_id to add on delete cascade
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
            // Drop added columns
            $table->dropColumn('slug');
            $table->dropColumn('image');
            $table->dropSoftDeletes();

            // Revert status column to its previous state
            $table->boolean('status')->default(false)->change();

            // Remove foreign key constraint
            $table->dropForeign(['category_id']);
        });
    }
}
