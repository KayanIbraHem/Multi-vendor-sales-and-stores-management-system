<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Controllers\DashboardController;

class ClientsController extends DashboardController
{
    protected string $view = 'clients';
    protected string $model = 'App\\Models\\Client';
    protected bool $btn_ajax = true;

    public function store(ClientRequest $request, ClientService $service)
    {
        $row = $service->handel($request->validated());
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء الصنف بنجاح', 'target' => 'clients', 'row' => $row], 200);
    }


    public function update(ClientRequest $request, ClientService $service, $category)
    {
        $row = $service->handel($request->validated(), $category);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل الصنف بنجاح'], 200);
    }
}
