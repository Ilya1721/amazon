<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Item;

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
}
