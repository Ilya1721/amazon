@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <h2>All Cart Items</h2>
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
        @foreach($cart->items as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->category->name }}</td>
          <td>{{ $item->price }}$</td>
          <td>{{ $item->supplier->name }}</td>
          <td>
            <a href="/item/{{ $item->id }}/deleteFromCart"
               class="btn btn-danger">
              Delete From Cart
            </a>
            <a href="/item/{{ $item->id }}/show" class="btn btn-info">
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
            <div class="row justify-content-center">
              <a href="/cart/pay" class="btn btn-primary ml-2 btn-block w-25"
                 role="button">
                <span id="buy-button">
                  Buy
                </span>
              </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
