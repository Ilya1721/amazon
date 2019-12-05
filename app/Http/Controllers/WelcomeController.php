<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class WelcomeController extends Controller
{
    public function index()
    {
      $items = Item::all();

      return view('welcome', [
        'items' => $items,
      ]);
    }
}
