<?php

namespace App\Presenters;

use Carbon\Carbon;
use Laracodes\Presenter\Presenter;

class VehiclePresenter extends Presenter
{
    public function kilometers() {
        return number_format($this->model->kilometers , 0, ',', '.') . ' km';
    }

    public function firstRegistered() {
        return Carbon::createFromFormat('Y-m-d', $this->model->first_registered)->format('d/m/Y');
    }

    public function weightInKilograms() {
        return $this->model->weight . ' kg';
    }

    public function co2Emission() {
        return $this->model->co2_emission . ' g/km';
    }

    public function cylinderCapacity() {
        return $this->model->cylinder_capacity . ' cm<sup>3</sup>';
    }
}