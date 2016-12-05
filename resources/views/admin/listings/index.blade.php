@extends('layouts.app')

@section('content')
<div class="container content center-xs">
<section class="section--vehicles">
    @include('partials.messages')
    <div class="col-lg-10 col-lg-offset-1">
        <div class="table-responsive-vertical shadow-z-1">
            <table id="table" class="table table-hover table-mc-light-blue">
                <thead>
                <tr>
                    <th>
                        Merk
                    </th>
                    <th>
                        <a href="{{route('listings.index', ['page' => $data['vehicles']->currentPage(), 'order' => 'vehicle_model_id', 'dir' => $data['dir']]) }}">
                            Model
                        </a>
                    </th>
                    <th>
                        <a href="{{route('listings.index', ['page' => $data['vehicles']->currentPage(), 'order' => 'first_registered', 'dir' => $data['dir']]) }}">
                            Bouwjaar
                        </a>
                    </th>
                    <th>
                        <a href="{{route('listings.index', ['page' => $data['vehicles']->currentPage(), 'order' => 'kilometers', 'dir' => $data['dir']]) }}">
                            Aantal Km
                        </a>
                    </th>
                    <th>
                        Brandstof
                    </th>
                    <th>
                        <a href="{{route('listings.index', ['page' => $data['vehicles']->currentPage(), 'order' => 'power', 'dir' => $data['dir']]) }}">
                            Vermogen
                        </a>
                    </th>
                    <th>
                        <a href="{{route('listings.index', ['page' => $data['vehicles']->currentPage(), 'order' => 'type', 'dir' => $data['dir']]) }}">
                            Type
                        </a>
                    </th>
                    <th><a href="{{url('admin/listings/create')}}" class="btn btn-default btn-block"><i class="fa fa-plus fa-lg"></i></a></th>
                </tr>
                </thead>

                <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->brand->name }}</td>
                        <td>{{ $vehicle->vehicleModel->name }}</td>
                        <td>{{ $vehicle->first_registered }}</td>
                        <td>{{ $vehicle->kilometers }}</td>
                        <td>{{ $vehicle->fuelType->name }}</td>
                        <td>{{ $vehicle->power }}</td>
                        <td>{{ $vehicle->body_type }}</td>
                        <td>
                            <a href="{{url('admin/listings/'.$vehicle->id .'/edit')}}" class="btn btn-default btn-block"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>

                            {{ Form::open(['url' => 'admin/listings/'.$vehicle->id, 'method' => 'DELETE']) }}
                            <button class="btn btn-default btn-block" type="submit">
                                <i class="fa fa-trash fa-lg"></i>
                            </button>

                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!!$data['vehicles']->appends($data['page_appends'])->links()!!}
        </div>
    </div>
</section>
</div>
@endsection