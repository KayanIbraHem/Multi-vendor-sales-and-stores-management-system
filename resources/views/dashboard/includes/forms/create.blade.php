<div class="card">
    <div class="card-header justify-content-between">
        <h3 class="card-title">@lang(getModule().'.create-row')</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="{{ routeHelper(getModule() . '.store') }}" class="submit-form" method="post">
        @include('dashboard.' . getModule() . '.inputs')
    </form>
</div>
