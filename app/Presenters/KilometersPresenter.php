<?php

namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class KilometersPresenter extends Presenter
{
    public function kilometers() {
        return number_format($this->model->kilometers , 0, ',', '.') . ' km';
    }
}