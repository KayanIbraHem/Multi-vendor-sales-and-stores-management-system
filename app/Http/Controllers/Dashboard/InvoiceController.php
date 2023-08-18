<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Item;
use App\Models\Store;
use App\Models\Client;
use App\Models\Invoice;
use App\Services\InvoiceService;
use App\Http\Requests\InoviceRequest;
use App\Http\Controllers\DashboardController;

class InvoiceController extends DashboardController
{
    protected string $view = 'invoices';
    protected string $model = 'App\\Models\\Invoice';
    protected bool $btn_ajax = false;

    public function items()
    {
        return Item::select('id', 'name')->filter()
            ->whereHas('stores', function ($query) {
                $query->where('store_id', request()->store_id);
            })->limit(10)->pluck('name', 'id');
    }

    public function itemDetails()
    {
        $row = Item::with([
            'category', 'unit',
            'stores' => function ($query) {
                $query->where('store_id', request()->store_id)->where('quantity', '>', '0');
            }
        ])->whereHas('stores', function ($query) {
            $query->where('store_id', request()->store_id)->where('quantity', '>', '0');
        })->find(request()->get('item_id'));
        if ($row) {
            return $row;
        }
        return response()->json(['message' => 'No Items In This Store...'], 500);
    }

    public function itemQuantity()
    {
        return Item::with('stores')->whereHas('stores', function ($query) {
            $query->where('item_id', request()->id);
        })->find(request()->get('id'));
    }

    public function store(InoviceRequest $request, InvoiceService $service)
    {
        $row = $service->handel($request->validated());
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['redirect' => routeHelper('invoices.index')], 200);
    }

    public function update(InoviceRequest $request, InvoiceService $service, $store)
    {
        $row = $service->handel($request->validated(), $store);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل الفاتورة بنجاح'], 200);
    }

    protected function append(): array
    {
        return [
            'clients' => Client::select('id', 'name')->pluck('name', 'id'),
            'stores'  => Store::select('id', 'name')->pluck('name', 'id'),
            'bill_no' => Invoice::getMaxNumber(),
            // 'units' => Unit::select('id', 'name')->pluck('name', 'id'),
        ];
    }
}
