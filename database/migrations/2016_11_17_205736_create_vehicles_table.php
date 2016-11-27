<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id', false, true);
            $table->integer('vehicle_model_id', false, true);
            $table->integer('fuel_type_id', false, true);
            $table->string('body_type');
            $table->string('transmission');
            $table->date('first_registered');
            $table->integer('kilometers', false, true);
            $table->tinyInteger('n_owners', false, true);
            $table->tinyInteger('n_seats', false, true);
            $table->tinyInteger('n_gears', false, true);
            $table->string('color');
            $table->string('color_type');
            $table->string('color_interior');
            $table->string('power');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicles');
    }
}
