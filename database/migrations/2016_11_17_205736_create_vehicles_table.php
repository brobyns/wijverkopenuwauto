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
            $table->integer('brand_id')->unsigned();
            $table->integer('vehicle_model_id')->unsigned();
            $table->integer('fuel_type_id')->unsigned();
            $table->string('body_type');
            $table->string('transmission');
            $table->date('first_registered');
            $table->integer('kilometers')->unsigned();
            $table->tinyInteger('n_owners')->unsigned();
            $table->tinyInteger('n_seats')->unsigned();
            $table->tinyInteger('n_gears')->unsigned();
            $table->tinyInteger('n_doors')->unsigned();
            $table->tinyInteger('n_cylinders')->unsigned();
            $table->string('color');
            $table->string('color_type');
            $table->string('color_interior');
            $table->string('interior');
            $table->string('power');
            $table->integer('cylinder_capacity')->unsigned();
            $table->integer('co2_emission')->unsigned();
            $table->string('emission_standard');
            $table->integer('weight')->unsigned();
            $table->boolean('damaged')->default(0);
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
