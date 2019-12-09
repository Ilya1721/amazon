<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Order;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
      $items = Item::query()
                     ->join('order_item', 'order_item.item_id',
                            'items.id')
                     ->join('orders', 'order_item.order_id',
                            'orders.id')
                     ->join('users', 'orders.user_id',
                            'users.id')
                     ->select('items.*')->get();

      $user = Auth::user();

      $orders = Order::query()
                       ->where('user_id', '=', $user->id)
                       ->get();


      return view('order', [
        'orders' => $orders,
      ]);
    }

    public function show($order)
    {
      $order = Order::find($order);

      $items = Item::query()
                     ->join('order_item', 'order_item.item_id',
                            'items.id')
                     ->where('order_item.order_id', '=', $order->id)
                     ->select('items.*')
                     ->get();

      return view('order_item', [
        'items' => $items,
      ]);
    }

    public function pdf($order)
    {
      $order = Order::find($order);

      $pdf = PDF::loadView('order_pdf', [
        'order' => $order,
      ]);

      return $pdf->download('order.pdf');
    }
}
