@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h2 class="text-center">All Countries</h2>
  <div class="row justify-content-center">
    <a href="/admin/countries/create"
       class="btn btn-block mb-2 w-50 btn-primary"
       role="button">
       Add new Country
    </a>
  </div>
  <div class="row justify-content-center">
    <table class="table table-light text-center">
      <thead class="thead-dark">
        <th>#</th>
        <th>Name</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($countries as $country)
        <tr>
          <td>{{ $country->id }}</td>
          <td>{{ $country->name }}</td>
          <td>
            <div class="row">
              <a href="/admin/countries/{{ $country->id }}/edit"
                 class="btn btn-block w-25 btn-info">
                Edit
              </a>
              <form action="/admin/countries/{{ $country->id }}"
                method="post">
                @csrf
                @method('delete')
                <button type="submit"
                 class="btn btn-block btn-danger ml-2">
                  Delete
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
