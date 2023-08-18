<div class="card-body">
    @csrf
    <div class="form-group">
        <label class="form-label required">Category Name</label>
        <div class="input-icon mb-3">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control"
                placeholder="Categoryname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>
    <div class="mb-3">
        <div class="form-label">Select Parent</div>
        <select class="form-select" name="category_id">
            <option value=""{{ request()->get('category_id') == 0 ? 'selected' : '' }}>Main Category</option>

            @foreach ($categories as $id => $name)
                <option value="{{ $id }}" {{ isset($row) && $row->category_id == $id ? 'selected' : '' }}>
                    {{ $name }}</option>
            @endforeach

        </select>
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-sm"> حفظ <i class="fas fa-save mx-2"></i> </button>
</div>
