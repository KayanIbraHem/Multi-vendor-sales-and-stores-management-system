@extends('layouts.dashboard')

@section('content')
    <div class="card">
        @include('dashboard.includes.page-header')
        @include('dashboard.includes.filter')
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                aria-label="Select all invoices"></th>
                        <th class="w-1">No.</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="load-table"></tbody>
            </table>

        </div>
    </div>
@endsection


