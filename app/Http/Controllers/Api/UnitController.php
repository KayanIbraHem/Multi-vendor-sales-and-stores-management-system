<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\UnitService;
use App\Http\Requests\UnitRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DashboardController;

class UnitController extends ApiController
{
    public function __construct()
    {
        parent::__construct(UnitResource::class, Unit::class);
    }

    public function store(UnitRequest $request, UnitService $service)
    {
        $row = $service->handel($request->validated());
        
        return response()->json([
            'success' => true,
            'message' => 'تم انشاء الوحدة بنجاح',
            'unit' => new UnitResource($row),
        ], 200);
    }

    public function update(UnitRequest $request, UnitService $service, $unit)
    {
        $row = $service->handel($request->validated(), $unit);
        return response()->json([
            'success' => true,
            'message' => 'تم تعديل الوحدة بنجاح',
            'unit' => new UnitResource($row),
        ], 200);
    }
}
