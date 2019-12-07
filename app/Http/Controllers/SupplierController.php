<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Country;

class SupplierController extends Controller
{
    public function index()
    {
      $suppliers = Supplier::all();

      return view('suppliers', [
        'suppliers' => $suppliers,
      ]);
    }

    public function create()
    {
      $countries = Country::all();

      return view('create_supplier', [
        'countries' => $countries,
      ]);
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
        'country_id' => 'required',
      ]);

      $supplier = Supplier::updateOrCreate($data);

      return redirect('/admin/suppliers');
    }

    public function edit($supplier)
    {
      $supplier = Supplier::find($supplier);
      $countries = Country::all();

      return view('edit_supplier', [
        'supplier' => $supplier,
        'countries' => $countries,
      ]);
    }

    public function update($supplier)
    {
      $data = request()->validate([
        'name' => 'required',
        'country_id' => 'required',
      ]);

      $supplier = Supplier::find($supplier);

      $supplier->update($data);

      return redirect('/admin/suppliers');
    }

    public function destroy($supplier)
    {
      $supplier = Supplier::find($supplier);

      $supplier->delete();

      return redirect('/admin/suppliers');
    }
}
