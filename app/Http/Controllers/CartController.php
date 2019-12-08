<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Item;
use App\Sale;
use App\Order;
use App\User;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $cart = $user->cart;
      $total = Cart::query()
                     ->join('cart_item', 'cart_item.cart_id',
                            'carts.id')
                     ->join('items', 'cart_item.item_id',
                            'items.id')
                     ->where('carts.id', '=', $cart->id)
                     ->sum('items.price');

      return view('cart', [
        'cart' => $cart,
        'total' => $total,
      ]);
    }

    public function add($item)
    {
      $user = Auth::user();

      DB::table('cart_item')
          ->insert([
            'item_id' => $item,
            'cart_id' => $user->cart->id,
          ]);

      return redirect('/');
    }

    public function delete($item)
    {
      $user = Auth::user();

      DB::table('cart_item')
          ->where('item_id', '=', $item)
          ->where('cart_id', '=', $user->cart->id)
          ->delete();

      return redirect('/cart');
    }

    public function setInfo()
    {
      $cart = Auth::user()->cart;

      $count = DB::table('cart_item')
                   ->where('cart_item.cart_id', '=', $cart->id)
                   ->count();

      if($count == 0)
      {
        return view('empty_cart');
      }

      return view('set_info');
    }

    public function pay()
    {
      $data = request()->validate([
        'state' => '',
        'city' => '',
        'street' => '',
        'house' => '',
        'flat' => '',
        'phone_number' => '',
      ]);
      $data['user_id'] = DB::table('users')->where('users.role_id', '=', '1')
                                           ->select('users.id')->first()->id;
                                           
      $items = Cart::query()
                    ->join('cart_item', 'cart_item.cart_id',
                           'carts.id')
                    ->join('items', 'cart_item.item_id',
                           'items.id')
                    ->where('carts.id', '=', Auth::user()->cart->id)
                    ->select('items.id')
                    ->get();

      $sale = Sale::find(Auth::user()->sale->id);

      $order = Order::create($data);

      $user = Auth::user();

      foreach($items as $item)
      {
        DB::table('order_item')->insert([
          'order_id' => $order->id,
          'user_id' => $user->id,
          'item_id' => $item->id,
        ]);
      }

      foreach($items as $item)
      {
        DB::table('sale_item')->insert([
            'sale_id' => $sale->id,
            'item_id' => $item->id,
        ]);
      }

      DB::table('cart_item')
            ->where('cart_item.cart_id', '=', Auth::user()->cart->id)
            ->delete();

      return view('success_payment');
    }
}
