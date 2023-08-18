<div class="card">
    <div class="card-header">
        <h3 class="card-title"> انشاء صنف جديده</h3>
    </div>


    <form action="{{ routeHelper('categories.store') }}" class="submit-form" method="post">
        @include('dashboard.categories.includes.inputs')
    </form>
</div>
