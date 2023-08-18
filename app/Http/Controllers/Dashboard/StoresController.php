<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Illuminate\Http\Request;
use App\Services\StoreService;
use App\Http\Requests\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;

class StoresController extends DashboardController
{
    protected string $view = 'stores';
    protected string $model = 'App\\Models\\Store';
    protected bool $btn_ajax = true;

    public function store(StoreRequest $request, StoreService $service)
    {
        $row = $service->handel($request->validated());
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء المخزن بنجاح'], 200);
    }

    public function update(StoreRequest $request, StoreService $service, $store)
    {
        $row = $service->handel($request->validated(), $store);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل المخزن بنجاح'], 200);
    }
}
