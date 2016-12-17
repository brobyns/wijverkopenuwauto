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
                        Actief
                    </th>
                    <th>
                        Verkocht
                    </th>
                    <th>
                        Titel
                    </th>
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
                    <th><a href="{{url('admin/listings/create')}}" class="btn btn-default btn-block"><i class="fa fa-plus fa-lg"></i></a></th>
                </tr>
                </thead>

                <tbody>
                @foreach ($listings as $listing)
                    <tr>
                        <td>{{ $listing->active == 1 ? 'Ja' : 'Nee' }}</td>
                        <td>{{ $listing->sold == 1 ? 'Ja' : 'Nee' }}</td>
                        <td>{{ $listing->title }}</td>
                        <td>{{ $listing->vehicle->brand->name }}</td>
                        <td>{{ $listing->vehicle->vehicleModel->name }}</td>
                        <td>{{ $listing->vehicle->first_registered }}</td>
                        <td>{{ $listing->vehicle->kilometers }}</td>
                        <td>{{ $listing->vehicle->fuelType->name }}</td>
                        <td>
                            <a href="{{url('admin/listings/'.$listing->id .'/edit')}}" class="btn btn-default btn-block"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>

                            {{ Form::open(['url' => 'admin/listings/'.$listing->id, 'method' => 'DELETE']) }}
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