<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function index()
    {
      $countries = Country::all();

      return view('countries', [
        'countries' => $countries,
      ]);
    }

    public function edit($country)
    {
      $country = Country::find($country);

      return view('edit_country', [
        'country' => $country,
      ]);
    }

    public function update($country)
    {
      $data = request()->validate([
        'name' => 'required',
      ]);

      $country = Country::find($country);

      $country->update($data);

      return redirect('/admin/countries');
    }

    public function create()
    {
      return view('create_country');
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
      ]);

      $country = Country::updateOrCreate($data);

      return redirect('/admin/countries');
    }

    public function destroy($country)
    {
      $country = Country::find($country);

      $country->delete();

      return redirect('/admin/countries');
    }
}
