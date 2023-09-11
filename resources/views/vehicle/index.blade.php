@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vehicle') }}</div>

                <div class="card-body">
                    <a href="{{ route('vehicle.create') }}" class="btn btn-primary">Add</a>
                    <br>
                    <table class="table table-striped ">
                        <tr>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Year</th>
                        </tr>
                        @foreach ($vehicles as $row)
                            <tr>
                                <td>{{ $row->brand }}</td>
                                <td>{{ $row->model }}</td>
                                <td>{{ $row->type }}</td>
                                <td>{{ $row->year }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
