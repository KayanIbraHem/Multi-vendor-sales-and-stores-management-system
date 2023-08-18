<?php

namespace App\Services;

use Exception;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemService
{

    public function handel(array $data, ?int $id = null)
    {
        try {
            // DB::beginTransaction();
            return Item::updateOrCreate(['id' => $id], $data);
            // $this->syncStores($data['store_id'], $row);
            // DB::commit();
            // return $row;
        } catch (Exception $e) {
            // DB::rollBack();
            return $e;
        }
    }

    protected function syncStores(?array $stores = [], Item $item)
    {
        $rows = [];
        foreach ($stores as $store) {
            $rows[$store['store_id']] = [
                'quantity' => number_format($store['quantity'], 4),
                'shop_id'  => shopId(),
            ];
        }
        if (count($rows)) $item->stores()->sync($rows);
    }
}
