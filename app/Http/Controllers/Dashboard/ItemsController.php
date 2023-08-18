<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ItemService;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;

class ItemsController extends DashboardController
{
    protected string $view = 'items';
    protected string $model = 'App\\Models\\Item';
    protected bool $btn_ajax = false;

    public function store(ItemRequest $request, ItemService $service)
    {
        $row = $service->handel($request->validated());
        $row->stores()->attach([$request->store_id => ['shop_id' => auth()->user()->shop_id, 'quantity' => $request->quantity]]);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء العنصر بنجاح'], 200);
    }

    public function update(ItemRequest $request, ItemService $service, $store)
    {
        $row = $service->handel($request->validated(), $store);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل العنصر بنجاح'], 200);
    }

    protected function append(): array
    {
        return [
            'categories' => Category::select('id', 'name')->pluck('name', 'id'),
            'units' => Unit::select('id', 'name')->pluck('name', 'id'),
            'stores' => Store::select('id', 'name')->pluck('name', 'id'),
            // 'barcode'    => (int) Item::max('barcode') + 1,
        ];
    }
}
