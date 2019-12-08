<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;

class CourierController extends Controller
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


      return view('courier', [
        'items' => $items,
      ]);
    }
}
