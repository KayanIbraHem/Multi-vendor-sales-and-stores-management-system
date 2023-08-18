<div class="card">
    <div class="card-header justify-content-center">
        <h3 class="card-title">Sub Categories</h3>
    </div>
    <div class="card-body">
        <link href="{{ asset('assets/css/tree-diagram.css') }}" rel="stylesheet" />

        <div class="tree-diagram">
            @include('dashboard.categories.tree-diagram', ['rows' => [$row]])
        </div>

    </div>
</div>
