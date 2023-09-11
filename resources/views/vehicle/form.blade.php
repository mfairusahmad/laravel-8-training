@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vehicle') }}</div>

                <div class="card-body">
                    <h2>Car Information Form</h2>
        <form>
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand">
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" name="model" placeholder="Enter Model">
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Enter Type">
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" id="year" name="year" placeholder="Enter Year">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
