<?php

namespace App\Services;

use App\Models\Category;
use Exception;

class CategoryService
{

    public function handel(array $data, ?int $id = null)
    {
        // dd($data);
        try {
            return Category::updateOrCreate(['id' => $id], $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
