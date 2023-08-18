<?php

namespace App\Services;

use Exception;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Invoice;
use App\Models\ItemStore;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\DB;

class InvoiceService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            DB::beginTransaction();
            $total = 0;
            $details = $data['items'];
            foreach ($data['items'] as $index => $item) {
                $details[$index]['pay_price'] = Item::select('pay_price')->where('id', $item['item_id'])->value('pay_price') ?? 0;
                $details[$index]['shop_id'] = shopId();
                $total += $item['sale_price'] * $item['qty'];
            }

            $data['bill_date'] = Carbon::parse($data['bill_date']);
            $invoice = Invoice::create(array_merge($data, ['total' => $total]));
            foreach ($data['items'] as $index => $item) {
                $details[$index]['invoice_id'] = $invoice->id;
                $this->syncItemQty($item);
            }

            InvoiceDetail::insert($details);
            DB::commit();
            return $invoice;
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    protected function syncItemQty(array $item): void
    {
        ItemStore::where('item_id', $item['item_id'])->where('store_id', request()->get('store_id'))->decrement('quantity', $item['qty']);
    }
}
