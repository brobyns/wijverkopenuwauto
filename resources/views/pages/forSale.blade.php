@extends('layouts.app')

@section('content')
    <div class="wrapper content center-xs">
        <section class="for-sale">
            <div class="row">
                @foreach($listings as $listing)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="{{url('te-koop/'. $listing->slug)}}">
                        <div class="card">
                            <div class="card-image">
                                <figure class="vehicle-image">
                                    <img src="{{ Storage::disk('public')->url($listing->images->first()->path . '/' . $listing->images->first()->name) }}">
                                    <i class="icon-enlarge"></i>
                                </figure>
                                <div class="listing-title">
                                    {{$listing->vehicle->brand->name}} - {{$listing->vehicle->vehicleModel->name}}
                                </div>
                            </div>

                            <div class="card-content info-basics">
                                <ul class="vehicle-properties">
                                    <li>
                                        <span class="property-name">{{Lang::get('vehicle.firstRegistered')}}</span>
                                        <span class="property-value">{{$listing->vehicle->present()->first_registered}}</span>
                                    </li>
                                    <li>
                                        <span class="property-name">{{Lang::get('vehicle.kilometers')}}</span>
                                        <span class="property-value">{{$listing->vehicle->present()->kilometers}}</span>
                                    </li>
                                    <li>
                                        <span class="property-name">{{Lang::get('vehicle.fuelType')}}</span>
                                        <span class="property-value">{{$listing->vehicle->fuelType->name}}</span>
                                    </li>
                                    <li>
                                        <span class="property-name">{{Lang::get('vehicle.transmission')}}</span>
                                        <span class="property-value">{{$listing->vehicle->transmission}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection