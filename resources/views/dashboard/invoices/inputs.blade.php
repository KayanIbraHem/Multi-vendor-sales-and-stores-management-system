@push('css')
    <style>
        #items {
            padding: 0;
            margin: 0;
            background: #fcfcfc;
            border: 2px solid #ccc;
            border-radius: 5px;
            max-height: 200px;
            overflow-y: scroll;
            box-shadow: 0px 4px 4px -1px #3f3f3f;
        }

        .selected-item {
            list-style: none;
            padding: 7px;
            background: #e3e3e3;
        }

        .selected-item:nth-child(odd) {
            background: #fff;
        }

        .selected-item:hover {
            background: #e9e9e9;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
@endpush
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label required">
                    @lang('clients.name')
                    <a href="{{ routeHelper('clients.create') }}" class="btn btn-sm btn-primary open-modal float-end"> <i
                            class="fas fa-plus px-0"></i> </a>
                </label>
                <select name="client_id" id="clients" class="form-control">
                    <option value="">---</option>
                    @foreach ($clients as $id => $name)
                        <option value="{{ $id }}"
                            {{ isset($row) && $row->client_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'client_id'])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label required">
                    @lang('stores.name')
                    <a href="{{ routeHelper('stores.create') }}" class="btn btn-sm btn-primary open-modal float-end"> <i
                            class="fas fa-plus px-0"></i> </a>
                </label>
                <select name="store_id" id="stores" class="form-control">
                    @foreach ($stores as $id => $name)
                        <option value="{{ $id }}"
                            {{ isset($row) && $row->store_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'store_id'])
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label class="form-label required"> @lang('invoice.date') </label>
                <div class="input-icon mb-3">
                    <input type="date" value="{{ old('bill_date', date('Y-m-d')) }}" name="bill_date"
                        class="form-control">
                    <span class="input-icon-addon"> <i class="fa fa-calendar" aria-hidden="true"></i> </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'bill_date'])
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label"> @lang('invoice.bill_no') </label>
                <input disabled readonly value="{{ $bill_no }}" class="form-control">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label"> @lang('items.quantity') </label>
                <input disabled readonly id="current_quantity" class="form-control">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label class="form-label required"> @lang('items.name') </label>
                <input type="search" id="item_name" autocomplete="off" class="form-control">
                <ul id="items" class="d-none"></ul>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label"> @lang('units.name') </label>
                <input disabled readonly id="unit" class="form-control">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label"> @lang('categories.name') </label>
                <input disabled readonly id="category" class="form-control">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label"> @lang('items.pay_price') </label>
                <input disabled readonly id="pay_price" class="form-control">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label"> @lang('items.sale_price') </label>
                <input type="number" id="sale_price" class="form-control">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label"> @lang('items.quantity') </label>
                <input type="number" id="quantity" class="form-control">
            </div>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-sm btn-info" id="add-item-details">Add</button>
        </div>
    </div>


    <div class="row">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th class="w-1">#</th>
                    <th>@lang('items.name')</th>
                    <th>@lang('menu.the category')</th>
                    <th>@lang('menu.the unit')</th>
                    <th>@lang('items.pay_price')</th>
                    <th>@lang('items.sale_price')</th>
                    <th>@lang('items.quantity')</th>
                    <th>@lang('invoice.total')</th>
                    <th>@lang('buttons.delete')</th>
                </tr>
            </thead>
            <tbody id="invoice-details"></tbody>
        </table>

    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label"> @lang('invoice.total') </label>
                <input disabled readonly value="0" id="total" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-sm btn-primary"> <i class="fas fa-save"></i> @lang('buttons.save')
            </button>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(function() {
            let ajax_request = {
                abort: function() {}
            };
            $('body').on('keyup focus', '#item_name', function(e) {
                if ([9, 16, 17, 20, undefined].includes(e.keyCode) || (e.keyCode >= 30 && e.keyCode <=
                        40)) {
                    return;
                }

                if ($('#stores').val() == '') {
                    alert('Please Select Store...');
                    return;
                }

                if ($(this).val() == '') return;
                ajax_request.abort();

                ajax_request = $.ajax({
                    url: "{{ routeHelper('invoices.items.list') }}",
                    type: "GET",
                    data: {
                        store_id: $('#stores').val(),
                        name: $(this).val()
                    },
                    success: function(response) {
                        $('#items').empty().removeClass('d-none');
                        $.each(response, function(key, val) {
                            $('#items').append(
                                `<li class="selected-item" data-name="${val}" data-id="${key}">${val}</li>`
                            );
                        });
                    }
                });
            });

            $("#quantity").on("change", function() {
                let qty = Number($(this).val());
                let current_qty = Number($('#current_quantity').val());
                let item_qty = Number($('body').find(`#item-row-id-${$('#item_name').data('id')} #item-qty`)
                    .val());
                let sumqty = current_qty - item_qty;
                if (qty > sumqty) {
                    $(this).val(sumqty);
                }

            });

            $("#item_name").on("focusout", function() {
                setTimeout(() => {
                    $("#items").addClass('d-none').empty();
                }, 200);
            });

            $('body').on('click', '.selected-item', function() {
                $('#item_name').val($(this).data('name'));
                $.ajax({
                    url: "{{ routeHelper('invoices.items.details') }}",
                    type: "GET",
                    data: {
                        item_id: $(this).data('id'),
                        store_id: $('#stores').val()
                    },
                    success: function(response) {
                        // console.log(response.stores[0].pivot.quantity);
                        $('#item_name').data('id', response.id);
                        $('#category').val(response.category.name).data('id', response
                            .category_id);
                        $('#unit').val(response.unit.name).data('id', response.unit_id);
                        $('#pay_price').val(response.pay_price);
                        $('#sale_price').val(response.sale_price);
                        $('#current_quantity').val(response.stores[0].pivot.quantity);
                        $('#quantity').val("").focus();
                    },
                    error: function(response) {
                        alert(response.responseJSON.message);

                    }
                });
            });

            $('body').on('click', '#add-item-details', function() {
                if ($('#quantity').val() <= 0) {
                    alert("Please type your qty..");
                    return;
                }
                checkItemCount($('#item_name').data('id'));
                emptyElements();
                calcTotal();
                $("#item_name").focus();
            });

            $('body').on('click', '.remove-row', function() {
                if (confirm("Are You Sure ??")) {
                    $(this).closest('tr').remove();
                    reCalcItem();
                    calcTotal();
                }
            });

            $('body').on('change', '#item-sale-prcie', function() {
                reCalcItem();
                calcTotal();
            });

            $('body').on('keyup', '#item-qty', function() {
                let qty = $(this).val();
                let old = $(this).data('old');
                if (qty > old) {
                    alert("Max qty is " + old);
                    $(this).val(old);
                }
                reCalcItem();
                calcTotal();
            });

            function drawTr() {
                let length = $('.item-row').length + 1;
                return `<tr class='item-row' id="item-row-id-${$('#item_name').data('id')}">
                        <input type="hidden" name="items[${length}][item_id]" value="${$('#item_name').data('id')}">
                        <input type="hidden" name="items[${length}][unit_id]" value="${$('#unit').data('id')}">
                        <input type="hidden" name="items[${length}][category_id]" value="${$('#category').data('id')}">
                        <td>${ length }</td>
                        <td>${ $('#item_name').val() }</td>
                        <td>${ $('#category').val() }</td>
                        <td>${ $('#unit').val() }</td>
                        <td>${ $('#pay_price').val() }</td>
                        <td><input id="item-sale-prcie" name='items[${length}][sale_price]' value="${ $('#sale_price').val() }"></td>
                        <td><input id="item-qty" name='items[${length}][qty]' value="${ $('#quantity').val() }" data-old="${$('#current_quantity').val()}"></td>
                        <td class='total-item'>${ Number($('#quantity').val()) * Number($('#sale_price').val()) }</td>
                        <td>
                            <button type="button" class='btn btn-danger btn-sm remove-row'> <i class='fas fa-trash'></i> </button>
                        </td>
                    </tr>`;
            }

            function checkItemCount(id) {
                if ($(`tr#item-row-id-${id}`).length) {
                    let count = Number($(`tr#item-row-id-${id}`).find("#item-qty").val()) + Number($('#quantity')
                        .val());
                    $(`tr#item-row-id-${id}`).find("#item-qty").val(count);
                    reCalcItem();
                } else {
                    $('#invoice-details').prepend(drawTr());
                }
            }

            function reCalcItem() {
                $.each($('#invoice-details .item-row'), function() {
                    let qty = Number($(this).find('#item-qty').val());
                    let price = Number($(this).find('#item-sale-prcie').val());
                    $(this).find('.total-item').text(qty * price);
                });
            }

            function calcTotal() {
                let total = 0;
                $.each($('.total-item'), function() {
                    total += Number($(this).text());
                });
                $('#total').val(total);
            }

            function emptyElements() {
                $('#category').val('');
                $('#unit').val('');
                $('#pay_price').val('');
                $('#sale_price').val('');
                $('#current_quantity').val('');
                $('#quantity').val('');
                $('#item_name').val('');
            }
        });
    </script>
@endpush
