<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::query()
                       ->join('sale_item', 'sale_item.item_id',
                              'items.id')
                       ->join('sales', 'sale_item.sale_id',
                              'sales.id')
                       ->select('items.*')
                       ->get();

        return view('home', [
          'items' => $items,
        ]);
    }
}
