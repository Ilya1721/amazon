<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
      $categories = Category::all();

      return view('categories', [
        'categories' => $categories,
      ]);
    }

    public function edit($category)
    {
      $category = Category::find($category);

      return view('edit_category', [
        'category' => $category,
      ]);
    }

    public function update($category)
    {
      $data = request()->validate([
        'name' => 'required',
      ]);

      $category = Category::find($category);

      $category->update($data);

      return redirect('/admin/categories');
    }

    public function create()
    {
      return view('create_category');
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
      ]);

      $category = Category::updateOrCreate($data);

      return redirect('/admin/categories');
    }

    public function destroy($category)
    {
      $category = Category::find($category);

      $category->delete();

      return redirect('/admin/categories');
    }
}
