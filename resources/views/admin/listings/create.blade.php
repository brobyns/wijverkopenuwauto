@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="container content center-xs">
        <section>
            {{ Form:: open(array('action' => 'ListingsController@store', 'id' => 'listing_form')) }}
            <h2>Nieuwe listing</h2>
            <div class="card">
                <div class="card-title">
                    Algemeen
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-6">
                                    {!! Form::label('title', 'Titel') !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::text('title', null,
                                            array('required',
                                                  'class'=>'input-manual',
                                                  'placeholder'=>'Titel van de listing')) !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::label('price', 'Prijs') !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::text('price', null,
                                            array('required',
                                                  'class'=>'input-manual',
                                                  'placeholder'=>'Prijs in euro')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-6">
                                    {!! Form::label('active', 'Actief') !!}
                                </div>
                                <div class="col-xs-6">
                                    <label class="control control--checkbox">
                                        {!! Form::checkbox('active', false) !!}
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::label('sold', 'Verkocht') !!}
                                </div>
                                <div class="col-xs-6">
                                    <label class="control control--checkbox">
                                        {!! Form::checkbox('sold', false) !!}
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-title">
                    Voertuig
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="row">
                                <div class="col-xs-6">
                                  {!! Form::label('brand', 'Merk') !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::select('brand', $brands, null, array('id' => 'brands_select')) !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::label('model', 'Model') !!}
                                </div>
                                <div class="col-xs-6">
                                    <select name="model" id="models_select"></select>
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::label('first_registered', 'Bouwjaar') !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::text('first_registered', \Carbon\Carbon::now()->format('m/Y'),
                                            array('id'=> 'datepicker',
                                                  'required',
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
                                    {!! Form::select('color_type', ['metallic' => 'metallic', 'mat' => 'mat'], null) !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::label('color_interior', 'Binnenkleur') !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::text('color_interior', null,
                                        array('required','class'=>'input-manual',
                                                'placeholder'=>'Binnenkleur')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="row">
                                <div class="col-xs-6">
                                    {!! Form::label('fuel_type', 'Brandstof') !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::select('fuel_type', $fuelTypes, null) !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::label('transmission', 'Transmissie') !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::select('transmission', ['Manueel' => 'Manueel', 'Automatisch' => 'Automatisch',
                                        'Halfautomaat' => 'Halfautomaat'], null) !!}
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
                                    {!! Form::select('body_type', ['Berline' => 'Berline', 'Bestelwagen' => 'Bestelwagen',
                                        'Break' => 'Break', 'Cabriolet' => 'Cabriolet', 'Coupe' => 'Coupe',
                                        'Monovolume' => 'Monovolume', 'Stadswagen' => 'Stadswagen', 'SUV/4x4' => 'SUV/4x4'], null) !!}
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
                                <div class="col-xs-6">
                                    {!! Form::label('n_doors', 'Aantal deuren') !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::text('n_doors', null,
                                            array('required',
                                                  'class'=>'input-manual',
                                                  'placeholder'=>'Aantal deuren')) !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::label('damaged', 'Beschadigd') !!}
                                </div>
                                <div class="col-xs-6">
                                    <label class="control control--checkbox">
                                        {!! Form::checkbox('damaged', false) !!}
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.vehicleProperties')
            <div class="card">
                <div class="card-title">Foto's</div>
                <div class="card-content">
                    @include('partials.upload')
                    <div id="fine-uploader-gallery"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::submit('Bewaar',
                         array('class'=>'btn btn-default')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </section>
    </div>
    <script src="/js/app.js"></script>
    <script src="/js/fine-uploader.js"></script>
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

            var galleryUploader = new qq.FineUploader({
                element: document.getElementById("fine-uploader-gallery"),
                template: 'qq-template-gallery',
                button: document.getElementById("drop-area"),
                request: {
                    endpoint: '/admin/upload'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: '/source/placeholders/waiting-generic.png',
                        notAvailablePath: '/source/placeholders/not_available-generic.png'
                    }
                },
                validation: {
                    allowedExtensions: ['jpeg', 'jpg', 'gif', 'png'],
                    stopOnFirstInvalidFile: false
                },
                callbacks: {
                    onComplete: function(id, name, responseJSON, xhr) {
                        var image_id = responseJSON.image_id;
                        $('<input />').attr('type', 'hidden')
                                .attr('name', "images[]")
                                .attr('value', image_id)
                                .appendTo('#listing_form');
                    }
                }
            });

            var picker = new Pikaday({ field: document.getElementById('datepicker') });
        });
    </script>
@endsection