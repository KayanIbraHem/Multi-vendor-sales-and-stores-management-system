@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title">
                @lang('menu.print_settings')
            </h3>
            <a href="{{ routeHelper('print_settings.print') }}" class="btn btn-sm btn-primary float-end"> <i
                    class="fas fa-print px-2"></i> @lang('buttons.print') </a>
        </div>

        <div class="card-body">
            <form method="post" action="{{ routeHelper('print_settings.update') }}">
                @csrf
                @foreach ($template as $title => $settings)
                    <div class="card mb-4">
                        <div class="card-header justify-content-between">
                            <h3 class="card-title"> {{ $title }} </h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($settings as $name => $label)
                                    <div class="col-md-4 px-4"
                                        style="border-bottom: 1px solid #adadad; margin-bottom: 20px; padding-bottom: 10px;">
                                        <div class="d-flex">
                                            <p class="font marg w-50"> <b> {{ $label }} </b> </p>

                                            <div class="switch-field w-50 h-75 ">
                                                <label class="px-2" style="cursor: pointer;"
                                                    for="{{ $name }}-yes">
                                                    @lang('buttons.yes')
                                                    <input type="radio" id="{{ $name }}-yes"
                                                        name="{{ $name }}" value="1"
                                                        @checked($row->$name == 1)>
                                                </label>

                                                <label class="px-2" style="cursor: pointer;" for="{{ $name }}-no">
                                                    @lang('buttons.no')
                                                    <input type="radio" id="{{ $name }}-no"
                                                        name="{{ $name }}" value="0"
                                                        @checked($row->$name == 0)>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit" class="btn btn-info"> @lang('buttons.save') <i class="fas fa-save"></i> </button>
                </div>
            </form>
        </div>
    </div>
@endsection
