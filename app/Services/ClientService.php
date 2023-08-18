<?php

namespace App\Services;

use Exception;
use App\Models\Client;
use App\Models\Category;

class ClientService
{

    public function handel(array $data, ?int $id = null)
    {
        // dd($data);
        try {
            return Client::updateOrCreate(['id' => $id], $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
