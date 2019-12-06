@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <h2>All Countries</h2>
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
            <a href="/country/{{ $country->id }}/edit"
               class="btn btn-block w-25 btn-info">
              Edit
            </a>
            <a href="/country/{{ $country->id }}/delete"
               class="btn bn-block w-25 btn-danger ml-2">
              Delete
            </a>
          </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
