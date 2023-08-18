<div class="card-header justify-content-between">
    <h3 class="card-title">
        Show {{ last(explode('/', request()->url())) }}
        <span id="show-count"></span>
    </h3>
    <div>
        <a href="{{ routeHelper(last(explode('/', request()->url())) . '.create') }}"
            class="btn btn-sm btn-primary {{ $btn_ajax ? 'open-modal' : '' }} float-left">@lang('buttons.create', ['model' => trans('menu.' . getModule(true))]) <i
                class="fas fa-plus"></i>
        </a>
        @if (Route::has(env('ROUTE_PREFIX') . '.' . getModule() . '.multi-delete'))
            <form method="post" action="{{ routeHelper(last(explode('/', request()->url())) . '.multi-delete') }}"
                class="float-left d-inline" id="multi-delete">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger" id="delete-rows">Multi Delete <i
                        class="fas fa-trash-alt"></i></button>
            </form>
        @endif
    </div>
</div>
