<?php

namespace App\Services;

use Exception;
use App\Models\UserDashboard;

class UserService
{

    public function handel(array $data, ?int $id = null)
    {
        try {
            return UserDashboard::updateOrCreate(['id' => $id], $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
