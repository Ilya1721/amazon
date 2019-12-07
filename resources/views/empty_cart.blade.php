@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <h2 class="text-justify">
      Sorry! But your cart is empty.
      Please Add some items to the cart
      to buy.
    </h2>
  </div>
  <div class="row justify-content-center">
    <a href="/cart" class="btn btn-block w-25 btn-primary"
       role="button">
       Cart
    </a>
  </div>
</div>
@endsection
