@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <h2 class="text-justify">
      Thank you for your order!
      We will send it to you
      as soon as possible.
    </h2>
  </div>
  <div class="row justify-content-center">
    <a href="/cart" class="btn btn-block w-25 btn-primary"
       role="button">
      Ok!
    </a>
  </div>
</div>
@endsection
