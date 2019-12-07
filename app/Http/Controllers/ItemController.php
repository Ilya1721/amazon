<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Supplier;
use App\Category;

class ItemController extends Controller
{
    public function index()
    {
      $items = Item::all();

      return view('items', [
        'items' => $items,
      ]);
    }

    public function show($item)
    {
      $item = Item::find($item);

      return view('item', [
        'item' => $item,
      ]);
    }

    public function create()
    {
      $suppliers = Supplier::all();
      $categories = Category::all();

      return view('create_item', [
        'suppliers' => $suppliers,
        'categories' => $categories,
      ]);
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
        'price' => 'required',
        'supplier_id' => 'required',
        'category_id' => 'required',
      ]);

      $item = Item::create($data);

      return redirect('/admin/items');
    }

    public function edit($item)
    {
      $item = Item::find($item);
      $suppliers = Supplier::all();
      $categories = Category::all();

      return view('edit_item', [
        'item' => $item,
        'suppliers' => $suppliers,
        'categories' => $categories,
      ]);
    }

    public function update($item)
    {
      $data = request()->validate([
        'name' => 'required',
        'price' => 'required',
        'supplier_id' => 'required',
        'category_id' => 'required',
      ]);

      $item = Item::find($item);

      $item->update($data);

      return redirect('/admin/items');
    }

    public function destroy($item)
    {
      $item = Item::find($item);

      $item->delete();

      return redirect('/admin/items');
    }
}
