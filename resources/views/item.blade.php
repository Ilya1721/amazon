@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h2 class="text-center">{{ $item->name }}</h2>
  <div class="row justify-content-center">
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
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->category->name }}</td>
          <td>{{ $item->price }}$</td>
          <td>{{ $item->supplier->name }}</td>
          <td>
            <a href="/item/{{ $item->id }}/addToCart"
               class="btn btn-primary">
              Add to Cart
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
