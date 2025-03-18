<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToVehicalGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehical_galleries', function (Blueprint $table) {
            // Add soft deletes
            $table->softDeletes();

            // Remove invalid vehical_id references before adding foreign key
            DB::statement("DELETE FROM vehical_galleries WHERE vehical_id NOT IN (SELECT id FROM vehicals)");

            // Ensure vehical_id is unsigned big integer
            $table->unsignedBigInteger('vehical_id')->change();

            // Add foreign key constraint
            $table->foreign('vehical_id')
                  ->references('id')
                  ->on('vehicals')
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
        Schema::table('vehical_galleries', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['vehical_id']);

            // Revert vehical_id to bigInteger
            $table->bigInteger('vehical_id')->change();

            // Drop soft deletes column
            $table->dropSoftDeletes();
        });
    }
}
