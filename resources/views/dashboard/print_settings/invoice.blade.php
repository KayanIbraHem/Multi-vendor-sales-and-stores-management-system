@extends('dashboard.print_settings.print')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title"> Invoice </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                        <i class="fas fa-print"></i>
                        Print Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card card-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="h3">Company</p>
                            @if ($setting->show_client_name)
                                <p>Albadr SysemSystem</p>
                            @endif
                            @if ($setting->show_client_phone)
                                <p>0100000000</p>
                            @endif
                            @if ($setting->show_client_address)
                                <address>
                                    Street Address<br>
                                    State, City<br>
                                    Region, Postal Code<br>
                                    ltd@example.com
                                </address>
                            @endif
                        </div>
                        <div class="col-6 text-end">
                            <p class="h3">Client</p>
                            @if ($setting->show_client_name)
                                <p>IbraHem MoSsad</p>
                            @endif
                            @if ($setting->show_client_phone)
                                <p>0100000000</p>
                            @endif
                            @if ($setting->show_client_address)
                                <address>
                                    Street Address<br>
                                    State, City<br>
                                    Region, Postal Code<br>
                                    ctr@example.com
                                </address>
                            @endif
                        </div>
                        <div class="col-12 my-5">
                            @if ($setting->show_invoice_no)
                                <h1>Invoice INV/001/15</h1>
                            @endif
                            @if ($setting->show_date)
                                <p class="text-muted"> {{ now() }} </p>
                            @endif
                        </div>
                    </div>

                    <table class="table table-transparent table-responsive">
                        <thead>
                            <tr>
                                @if ($setting->show_index)
                                    <th class="text-center" style="width: 1%"></th>
                                @endif
                                @if ($setting->show_barcode)
                                    <th class="text-end" style="width: 1%">Barcode</th>
                                @endif
                                @if ($setting->show_item_name)
                                    <th>Product</th>
                                @endif
                                @if ($setting->show_unit)
                                    <th class="text-end" style="width: 1%">Unit</th>
                                @endif
                                @if ($setting->show_qty)
                                    <th class="text-center" style="width: 1%">Qnt</th>
                                @endif
                                @if ($setting->show_sale_price)
                                    <th class="text-end" style="width: 1%">Sale Price</th>
                                @endif
                                @if ($setting->show_item_total)
                                    <th class="text-end" style="width: 1%">Total</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @if ($setting->show_index)
                                    <td class="text-center">1</td>
                                @endif
                                @if ($setting->show_barcode)
                                    <td class="text-end">100001</td>
                                @endif
                                @if ($setting->show_item_name)
                                    <td> Logo Creation </td>
                                @endif
                                @if ($setting->show_unit)
                                    <td class="text-center"> كرتونة </td>
                                @endif
                                @if ($setting->show_qty)
                                    <td class="text-center"> 5 </td>
                                @endif
                                @if ($setting->show_sale_price)
                                    <td class="text-center"> 120 </td>
                                @endif
                                @if ($setting->show_item_total)
                                    <td class="text-end"> 600 </td>
                                @endif
                            </tr>
                            <tr>
                                @if ($setting->show_index)
                                    <td class="text-center">2</td>
                                @endif
                                @if ($setting->show_barcode)
                                    <td class="text-end">100002</td>
                                @endif
                                @if ($setting->show_item_name)
                                    <td> Item 2 </td>
                                @endif
                                @if ($setting->show_unit)
                                    <td class="text-center"> علبة </td>
                                @endif
                                @if ($setting->show_qty)
                                    <td class="text-center"> 2 </td>
                                @endif
                                @if ($setting->show_sale_price)
                                    <td class="text-center"> 50 </td>
                                @endif
                                @if ($setting->show_item_total)
                                    <td class="text-end"> 100 </td>
                                @endif
                            </tr>
                        </tbody>

                        <footer>
                            <tr>
                                <td colspan="6" class="strong text-end">Subtotal</td>
                                <td class="text-end">700</td>
                            </tr>
                        </footer>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
