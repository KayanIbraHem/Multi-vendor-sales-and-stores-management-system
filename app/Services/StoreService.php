<?php

namespace App\Services;

use Exception;
use App\Models\Store;

class StoreService
{

    public function handel(array $data, ?int $id = null)
    {
        try {
            return Store::updateOrCreate(['id' => $id], $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
