<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class WelcomeController extends Controller
{
    public function index()
    {
      $items = Item::all();
      $categories = Category::all();

      return view('welcome', [
        'items' => $items,
        'categories' => $categories,
      ]);
    }
}
