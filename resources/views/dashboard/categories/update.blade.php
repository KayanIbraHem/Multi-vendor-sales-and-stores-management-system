<div class="card">
    <div class="card-header">
        <h3 class="card-title"> تعديل صنف المستخدم </h3>
    </div>


    <form action="{{ routeHelper('categories.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.categories.includes.inputs')
    </form>
</div>
