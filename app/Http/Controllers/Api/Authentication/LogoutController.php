<?php

namespace App\Http\Controllers\Api\Authentication;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->tokens()->delete();
        return response()->json([
            'message' => 'logout successfully',
        ], Response::HTTP_OK);
    }
}
