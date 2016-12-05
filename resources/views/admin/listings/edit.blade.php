@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="container content center-xs">
        <section>

        <h1><i class='fa fa-automobile'></i> Bewerk voertuig </h1>

            {{ Form::model($vehicle, ['role' => 'form', 'url' => 'admin/vehicles/' . $vehicle->id, 'method' => 'PUT']) }}
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="row">
                        <div class="col-xs-6">
                            {!! Form::label('brand', 'Merk') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::select('brand', $brands, $vehicle->brand->id, array('id' => 'brands_select')) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('model', 'Model') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::select('model', $vehicle->brand->models->pluck('name', 'id'), $vehicle->vehicleModel->id,
                                array('id' => 'models_select')) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('first_registered', 'Bouwjaar') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::date('first_registered', \Carbon\Carbon::now(),
                                       array('required',
                                             'class'=>'input-manual',
                                             'placeholder'=>'Bouwjaar')) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('n_owners', 'Aantal eigenaars') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::text('n_owners', null,
                                    array('required',
                                          'class'=>'input-manual',
                                          'placeholder'=>'Aantal eigenaars')) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('kilometers', 'Kilometerstand') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::text('kilometers', null,
                                   array('required','class'=>'input-manual',
                                           'placeholder'=>'Aantal kilometers')) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('color', 'Kleur') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::text('color', null,
                                array('required','class'=>'input-manual',
                                        'placeholder'=>'Kleur')) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('color_type', 'Kleurtype') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::select('color_type', ['metallic' => 'metallic', 'mat' => 'mat'], $vehicle->color_type) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="row">
                        <div class="col-xs-6">
                            {!! Form::label('color_interior', 'Binnenkleur') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::text('color_interior', null,
                                array('required','class'=>'input-manual',
                                        'placeholder'=>'Binnenkleur')) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('fuel_type', 'Brandstof') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::select('fuel_type', $fuelTypes, $vehicle->fuelType->id) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('transmission', 'Transmissie') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::select('transmission', ['manueel' => 'manueel', 'automatisch' => 'automatisch',
                                'halfautomaat' => 'halfautomaat'], $vehicle->transmission) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('power', 'Vermogen') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::text('power', null,
                                array('required','class'=>'input-manual',
                                        'placeholder'=>'Vermogen')) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('body_type', 'Carrosserietype') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::select('body_type', ['berline' => 'berline', 'bestelwagen' => 'bestelwagen',
                                'break' => 'break', 'cabriolet' => 'cabriolet', 'coupe' => 'coupe',
                                'monovolume' => 'monovolume', 'stadswagen' => 'stadswagen', 'SUV/4x4' => 'SUV/4x4'], $vehicle->body_type) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('n_gears', 'Aantal versnellingen') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::text('n_gears', null,
                                    array('required',
                                          'class'=>'input-manual',
                                          'placeholder'=>'Aantal versnellingen')) !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::label('n_seats', 'Aantal zitplaatsen') !!}
                        </div>
                        <div class="col-xs-6">
                            {!! Form::text('n_seats', null,
                                    array('required',
                                          'class'=>'input-manual',
                                          'placeholder'=>'Aantal zitplaatsen')) !!}
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.vehicleProperties')
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::submit('Bewaar',
                         array('class'=>'input-submit')) !!}
                </div>
            </div>

        {{ Form::close() }}
        </section>
    </div>
    <script src="/js/app.js"></script>
    <script>
        $(function () {
            var models_data = JSON.parse({!!$models!!});

            $('#brands_select').change(function(){
                var id = $(this).val();
                var models = $('#models_select');
                models.empty();
                $.each(models_data, function(key, value) {
                    if(value.brand_id == id) {
                        models.append($("<option></option>")
                                .attr("value",value.id)
                                .text(value.name));
                    }
                });
            });
        });
    </script>
@endsection