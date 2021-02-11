<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Yajra\DataTables\DataTables;

class ReturnedApiController extends Controller
{
  public function all()
  {
    $orders = Order::where('status', 'RETURNED')->latest()->get();
    return DataTables::of($orders)
      ->addColumn('select', function ($row) {
        $item = '<input type="checkbox" name="ids[]" class="selectbox" value="' . $row->id . '">
        ';
        return $item;
      })
      ->addColumn('created_at', function ($row) {
        return date('d/m/Y h:i A', strtotime($row->created_at));
      })
      ->addColumn('order_number', function ($row) {
        $item = '<a href="order/' . $row->id . '" class="">' . $row->order_number . '</a>';
        return $item;
      })
      ->addColumn('printed', function ($row) {
        $val = $row->printed ? 'Printed' : 'Not printed';
        $class = $row->printed ? 'text-primary' : 'text-danger';
        $item = '<a href="javascript:void(0)" title="print invoice" class="' . $class . '">' . $val . '</a>';
        return $item;
      })

      ->rawColumns(['select', 'order_number', 'printed'])
      ->make(true);
  }
}
