@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Show Item Details </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <th>{{ $row->name }}</th>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <th>{{ $row->category->name }}</th>
                    </tr>
                    <tr>
                        <th>Unit</th>
                        <th>{{ $row->unit->name }}</th>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <th>{{ $row->unit->name }}</th>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <th> {!! $row->desc !!} </th>
                    </tr>
                    <tr>
                        <th class="bg-info text-white" colspan="2">Stores</th>
                    </tr>
                    @foreach ($row->stores as $store)
                        <tr>
                            <th>{{ $store->name }}</th>
                            <th> {{ $store->pivot->quantity }} </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
