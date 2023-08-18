<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserDashboard;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends DashboardController
{
    protected string $view = 'users';
    protected string $model = 'App\\Models\\UserDashboard';
    protected bool $btn_ajax = true;

    public function store(UserRequest $request, UserService $service)
    {

        $row = $service->handel($request->validated());
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
    }

    public function update(UserRequest $request, UserService $service, $user)
    {
        $row = $service->handel($request->validated(), $user);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل اليوزر بنجاح'], 200);
    }
}
