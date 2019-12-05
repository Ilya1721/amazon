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

      return view('cart', [
        'cart' => $cart,
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
}
