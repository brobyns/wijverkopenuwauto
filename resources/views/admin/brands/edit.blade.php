@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="container content center-xs">
        <section>

        <h1> Bewerk merk </h1>

            {{ Form::model($brand, ['role' => 'form', 'url' => 'admin/brands/' . $brand->id, 'method' => 'PUT']) }}
            <div class="row">
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

        {{ Form::close() }}
        </section>
    </div>

@endsection