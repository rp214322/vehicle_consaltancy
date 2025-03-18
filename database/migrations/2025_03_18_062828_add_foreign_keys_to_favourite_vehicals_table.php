<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFavouriteVehicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favourite_vehicals', function (Blueprint $table) {
            // Add soft deletes
            $table->softDeletes();
        });

        // Remove invalid vehical_id references before adding foreign key
        DB::statement("DELETE FROM favourite_vehicals WHERE vehical_id NOT IN (SELECT id FROM vehicals)");
        DB::statement("DELETE FROM favourite_vehicals WHERE user_id NOT IN (SELECT id FROM users)");

        Schema::table('favourite_vehicals', function (Blueprint $table) {
            // Ensure vehical_id is unsigned big integer
            $table->unsignedBigInteger('vehical_id')->change();
            // Add foreign key constraint
            $table->foreign('vehical_id')
                  ->references('id')
                  ->on('vehicals')
                  ->onDelete('cascade');

            // Ensure user_id is unsigned big integer
            $table->unsignedBigInteger('user_id')->change();
            // Add foreign key constraint
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        Schema::table('favourite_vehicals', function (Blueprint $table) {
            // Drop foreign keys first
            $table->dropForeign(['vehical_id']);
            $table->dropForeign(['user_id']);

            // Revert vehical_id and user_id to bigInteger
            $table->bigInteger('vehical_id')->change();
            $table->bigInteger('user_id')->change();

            // Drop soft deletes column
            $table->dropSoftDeletes();
        });
    }
}
