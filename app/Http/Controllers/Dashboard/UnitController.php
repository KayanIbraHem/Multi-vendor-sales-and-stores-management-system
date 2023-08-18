<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\UnitService;
use App\Http\Requests\UnitRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;

class UnitController extends DashboardController
{
    protected string $view = 'units';
    protected string $model = 'App\\Models\\Unit';
    protected bool $btn_ajax = true;

    public function store(UnitRequest $request, UnitService $service)
    {

        $row = $service->handel($request->validated());
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
    }

    public function update(UnitRequest $request, UnitService $service, $unit)
    {
        $row = $service->handel($request->validated(), $unit);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل اليوزر بنجاح'], 200);
    }
}
