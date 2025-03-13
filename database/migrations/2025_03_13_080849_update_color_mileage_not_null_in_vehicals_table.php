<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColorMileageNotNullInVehicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicals', function (Blueprint $table) {
            $table->string('color')->nullable(false)->change();
            $table->string('mileage')->nullable(false)->change();
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
            $table->string('color')->nullable()->change();
            $table->string('mileage')->nullable()->change();
        });
    }
}
