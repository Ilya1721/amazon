<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Item;
use App\Sale;

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

    public function pay()
    {
        $items = Cart::query()
                      ->join('cart_item', 'cart_item.cart_id',
                             'carts.id')
                      ->join('items', 'cart_item.item_id',
                             'items.id')
                      ->where('carts.id', '=', Auth::user()->cart->id)
                      ->select('items.id')
                      ->get();

        $sale = Sale::find(Auth::user()->sale->id);

        foreach($items as $item)
        {
          DB::table('sale_item')->insert([
              'sale_id' => $sale->id,
              'item_id' => $item->id,
          ]);
        }

        return redirect('/cart');
    }
}
