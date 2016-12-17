<div class="card">
    <div class="card-title">Voertuigopties</div>
    <div class="card-content">
        <div class="row">
            @foreach($properties as $property)
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <label class="control control--checkbox">{{$property->name}}
                        {!! Form::checkbox('properties[]', $property->id, $listing != null ? $listing->vehicle->vehicleProperties->contains($property->id): false) !!}
                        <div class="control__indicator"></div>
                    </label>
                </div>
            @endforeach
        </div>
        <div class="row end-xs">
            <div class="col-xs-3 col-sm-1">
                <a class="btn btn-default btn-block" data-toggle="modal" data-target="#createModal">
                    <i class="fa fa-plus fa-lg"></i>
                </a>
            </div>
        </div>
    </div>
</div>