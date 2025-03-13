<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVehicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicals', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->change();

            // Add foreign key constraint
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('brand_id')->change();

            // Add foreign key constraint
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');

            $table->unsignedBigInteger('model_id')->change();

            // Add foreign key constraint
            $table->foreign('model_id')
                    ->references('id')
                    ->on('models')
                    ->onDelete('cascade');

            $table->string('fuel')->change();
            $table->dropColumn('description');
            $table->text('technical')->nullable(false);
            $table->text('feature_option')->nullable(false);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicals', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->bigInteger('category_id')->change();
            $table->dropForeign(['brand_id']);
            $table->bigInteger('brand_id')->change();
            $table->dropForeign(['model_id']);
            $table->bigInteger('model_id')->change();

            $table->enum('fuel', ['petrol', 'diesal', 'electric'])->default('petrol')->change();
            $table->dropColumn(['technical', 'feature_option']);
            $table->text('description')->nullable();
            $table->dropSoftDeletes();
        });
    }
}
