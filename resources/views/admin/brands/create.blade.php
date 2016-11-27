@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="container content center-xs">
        <section>
            {{ Form:: open(array('action' => 'BrandsController@store')) }}
            <div class="row">
                <div class="col-xs-12">
                    <h2>Voeg merk toe</h2>
                </div>
                <div class="col-xs-12">
                    {!! Form::text('name', null,
                                    array('required',
                                          'class'=>'input-manual',
                                          'placeholder'=>'model')) !!}
                </div>
                <div class="col-xs-12">
                    {!! Form::submit('Bewaar',
                        array('class'=>'input-submit')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </section>
    </div>
@endsection