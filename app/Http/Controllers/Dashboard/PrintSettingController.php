<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\PrintSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintSettingController extends Controller
{
    public function index()
    {
        $row = PrintSetting::first() ?? new PrintSetting;
        $template = $this->setTemplate();
        return view('dashboard.print_settings.index', compact('template', 'row'));
    }

    public function print()
    {
        $setting = PrintSetting::first() ?? new PrintSetting;
        return view('dashboard.print_settings.invoice', compact('setting'));
    }

    public function update(Request $request)
    {
        dd($request->all());
        try {
            $row = PrintSetting::first() ?? new PrintSetting;
            foreach ($request->all() as $key => $value) {
                if ($row->isFillable($key) && in_array($value, [0, 1]))
                    $row->$key = $value;
            }
            $row->save();
            return back()->with('success', trans("flash.row updated", ['model' => trans('menu.print_settings')]));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    protected function setTemplate(): array
    {
        return [
            trans('print_settings.item-details.title') => [
                'show_item_name'  => trans('print_settings.item-details.show_item_name'),
                'show_unit'       => trans('print_settings.item-details.show_unit'),
                'show_qty'        => trans('print_settings.item-details.show_qty'),
                'show_sale_price' => trans('print_settings.item-details.show_sale_price'),
                'show_barcode'    => trans('print_settings.item-details.show_barcode'),
                'show_item_total' => trans('print_settings.item-details.show_item_total'),
                'show_index'      => trans('print_settings.item-details.show_index'),
            ],
            trans('print_settings.client-details.title') => [
                'show_client_name'    => trans('print_settings.client-details.show_client_name'),
                'show_client_phone'   => trans('print_settings.client-details.show_client_phone'),
                'show_client_address' => trans('print_settings.client-details.show_client_address')
            ],
            trans('print_settings.shop-details.title') => [
                'show_shop_name'    => trans('print_settings.shop-details.show_shop_name'),
                'show_shop_phone'   => trans('print_settings.shop-details.show_shop_phone'),
                'show_shop_address' => trans('print_settings.shop-details.show_shop_address')
            ],
            trans('print_settings.invoice-details.title') => [
                'show_invoice_no' => trans('print_settings.invoice-details.show_invoice_no'),
                'show_date'       => trans('print_settings.invoice-details.show_date'),
                'show_qrcode'     => trans('print_settings.invoice-details.show_qrcode'),
                'show_creator'    => trans('print_settings.invoice-details.show_creator')
            ],
        ];
    }
}
