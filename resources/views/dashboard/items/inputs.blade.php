<div class="card-body">
    @csrf
    <div class="form-group">
        <label class="form-label required">@lang('items.name')</label>
        <div class="input-icon mb-3">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control"
                placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>
    <div class="mb-3">
        <div class="form-label">@lang('items.select-store')</div>
        <select class="form-select" name="store_id">
            @foreach ($stores as $id => $name)
                <option value="{{ $id }}" {{ isset($row) && $row->store_id == $id ? 'selected' : '' }}>
                    {{ $name }}</option>
            @endforeach
        </select>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'store_id'])
    </div>
    <div class="mb-3">
        <div class="form-label">@lang('items.select-category')</div>
        <select class="form-select" name="category_id">
            @foreach ($categories as $id => $name)
                <option value="{{ $id }}" {{ isset($row) && $row->category_id == $id ? 'selected' : '' }}>
                    {{ $name }}</option>
            @endforeach
        </select>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'category_id'])
    </div>
    <div class="mb-3">
        <div class="form-label">@lang('items.select-unit')</div>
        <select class="form-select" name="unit_id">
            @foreach ($units as $id => $name)
                <option value="{{ $id }}" {{ isset($row) && $row->unit_id == $id ? 'selected' : '' }}>
                    {{ $name }}</option>
            @endforeach
        </select>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'unit_id'])
    </div>
    <div class="form-group mb-3">
        <label class="form-label required">@lang('items.sale_price')</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->sale_price ?? old('sale_price') }}" name="sale_price"
                class="form-control" placeholder="@lang('items.sale_price')" autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'sale_price'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">@lang('items.pay_price')</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->pay_price ?? old('pay_price') }}" name="pay_price"
                class="form-control" placeholder="@lang('items.pay_price')" autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'pay_price'])
    </div>

    <div class="form-group">
        <label class="form-label required">@lang('items.quantity')</label>
        <div class="input-icon mb-3">
            <input type="number" value="{{ $row->name ?? '' }}" name="quantity" class="form-control"
                placeholder="Itemquantity..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'quantity'])
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">الوصف</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" cols="12" name="desc"></textarea>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'desc'])
    </div>
    {{-- <div class="form-group mb-3">
        <label class="form-label required">@lang('items.barcode')</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->barcode ?? old('barcode', $barcode) }}" name="barcode"
                class="form-control" placeholder="@lang('items.barcode')" autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'barcode'])
    </div> --}}
</div>
<div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-sm"> حفظ <i class="fas fa-save mx-2"></i> </button>
</div>
