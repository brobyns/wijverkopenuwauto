@extends('layouts.app')

@section('content')
    <div class="container content center-xs">
        <section class="section--brands">
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
                                Aantal voertuigen
                            </th>
                            <th>
                                <a href="{{url('admin/brands/create')}}" class="btn btn-default btn-block"><i class="fa fa-plus fa-lg"></i></a>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->name }}</td>
                                <td>{{ count($brand->vehicles) }}</td>
                                <td>
                                    <a href="{{url('admin/brand/'.$brand->id .'/edit')}}" class="btn btn-default btn-block"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>

                                    {{ Form::open(['url' => 'admin/brands/'.$brand->id, 'method' => 'DELETE']) }}
                                    <button class="btn btn-default btn-block" type="submit">
                                        <i class="fa fa-trash fa-lg"></i>
                                    </button>

                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!!$data['brands']->appends($data['page_appends'])->links()!!}
                </div>
            </div>
        </section>
    </div>
@endsection