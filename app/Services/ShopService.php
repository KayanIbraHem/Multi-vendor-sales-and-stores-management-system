<?php

namespace App\Services;

use Exception;
use App\Models\Shop;

class ShopService
{

    public function handel(array $data, ?int $id = null)
    {
        try {
            return Shop::updateOrCreate(['id' => $id], $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
