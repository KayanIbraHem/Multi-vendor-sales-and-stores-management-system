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
                                <th class="w-1">#</th>
                                <th>@lang('invoices.date')</th>
                                <th>@lang('clients.name')</th>
                                <th>@lang('users.name')</th>
                                <th>@lang('invoices.total')</th>
                                <th>@lang('buttons.edit')</th>
                                <th>@lang('buttons.delete')</th>
                    </tr>
                </thead>
                <tbody id="load-table"></tbody>
            </table>

        </div>
    </div>
@endsection


