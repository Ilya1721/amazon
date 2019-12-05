<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index($item)
    {
        $item = Item::find($item);

        return view('item', [
          'item' => $item,
        ]);
    }
}
