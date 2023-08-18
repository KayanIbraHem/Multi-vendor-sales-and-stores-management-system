@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title">
                Settings
            </h3>
        </div>

        <div class="card-body">
            <form action="{{ routeHelper('store') }}" class="submit-form" method="post">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label required">Shop Name</label>
                    <div class="input-icon">
                        <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="Shop Name..." autofocus>
                        <span class="input-icon-addon"> <i class="fa-solid fa-building"></i> </span>
                    </div>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
                </div>

                <div class="form-group mb-3">
                    <label class="form-label required">Address</label>
                    <div class="input-icon">
                        <input type="text" value="{{ $row->address ?? '' }}" name="address" class="form-control" placeholder="Address..." autofocus>
                        <span class="input-icon-addon"> <i class="fa-solid fa-location-dot"></i> </span>
                    </div>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'address'])
                </div>

                <div class="form-group mb-3">
                    <label class="form-label required">Phone</label>
                    <div class="input-icon">
                        <input type="text" value="{{ $row->phone ?? '' }}" name="phone" class="form-control" placeholder="Phone..." autofocus>
                        <span class="input-icon-addon"> <i class="fa-solid fa-phone"></i> </span>
                    </div>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'phone'])
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
                </div>
            </form>
        </div>

        <div class="card-footer">
            <form method="post" action="{{ routeHelper('destroy') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-row"> Delete Every Thing <i class="fas fa-trash"></i> </button>
            </form>
        </div>
    </div>
@endsection
