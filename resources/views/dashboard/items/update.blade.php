<div class="card">
    <div class="card-header">
        <h3 class="card-title"> تعديل العنصر  </h3>
    </div>


    <form action="{{ routeHelper('items.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.items.includes.inputs')
    </form>
</div>
