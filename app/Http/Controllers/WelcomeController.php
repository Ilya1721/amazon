<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\Category;
use App\Supplier;

class WelcomeController extends Controller
{
    public function index()
    {
      $items = Item::all();
      $categories = Category::all();
      $suppliers = Supplier::all();

      return view('welcome', [
        'items' => $items,
        'categories' => $categories,
        'suppliers' => $suppliers,
      ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'category' => '',
      ]);

      $categories = Category::all();
      $suppliers = Supplier::all();
      if($data['category'] != 'all')
      {
        $items = Item::query()
                     ->join('categories', 'categories.id', '=',
                                          'items.category_id')
                     ->where('items.category_id', '=', $data['category'])
                     ->select('items.*')
                     ->get();
      }
      else
      {
        $items = Item::all();
      }

      return view('welcome', [
        'items' => $items,
        'categories' => $categories,
        'suppliers' => $suppliers,
      ]);
    }

    public function sort()
    {
      $data = request()->validate([
        'category' => '',
        'rule' => '',
      ]);

      $categories = Category::all();
      $suppliers = Supplier::all();
      if($data['rule'] != 'NOSORT')
      {
        $items = Item::query()
                       ->orderBy($data['category'], $data['rule'])
                       ->get();
      }
      else
      {
        $items = Item::all();
      }

      return view('welcome', [
        'items' => $items,
        'categories' => $categories,
        'suppliers' => $suppliers,
      ]);
    }

    public function search()
    {
      $data = request()->validate([
        'category' => '',
        'search' => '',
      ]);

      $categories = Category::all();
      $suppliers = Supplier::all();
      $items = Item::query()
                     ->where($data['category'], 'LIKE',
                             '%'.$data['search'].'%')
                     ->get();

      return view('welcome', [
        'items' => $items,
        'categories' => $categories,
        'suppliers' => $suppliers,
      ]);
    }
}
