@extends('layouts.app')

@section('content')
    <div class="container content center-xs">
        <section class="for-sale">
            <div class="row">
                @foreach($listings as $listing)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
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
                                        <span class="property-name">Brandstof</span>
                                        <span class="property-value">{{$listing->vehicle->fuelType->name}}</span>
                                    </li>
                                    <li>
                                        <span class="property-name">Transmissie</span>
                                        <span class="property-value">{{$listing->vehicle->transmission}}</span>
                                    </li>
                                    <li>
                                        <span class="property-name">Kilometerstand</span>
                                        <span class="property-value">{{$listing->vehicle->present()->kilometers}}</span>
                                    </li>
                                    <li>
                                        <span class="property-name">Jaar</span>
                                        <span class="property-value">{{$listing->vehicle->first_registered}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection