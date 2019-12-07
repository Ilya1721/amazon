@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <h2>All bought items</h2>
    <table class="table table-light text-center">
      <thead class="thead-dark">
        <th>#</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Supplier</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->category->name }}</td>
          <td>{{ $item->price }}$</td>
          <td>{{ $item->supplier->name }}</td>
          <td>
            <a href="/item/{{ $item->id }}" class="btn btn-info">
              More Info
            </a>
          </td>
        </tr>
        @endforeach
        <tr>
          <td colspan="6">
            <div id="total-label" class="row justify-content-center">
              <h5 class="pr-1 text-center">Total:</h5>{{ $total }}$
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
