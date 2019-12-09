@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <h2>All orders</h2>
    <table class="table table-light text-center">
      <thead class="thead-dark">
        <th>#</th>
        <th>Phone number</th>
        <th>State</th>
        <th>City</th>
        <th>Street</th>
        <th>House</th>
        <th>Flat</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>{{ $order->phone_number}}</td>
          <td>{{ $order->state }}</td>
          <td>{{ $order->city }}</td>
          <td>{{ $order->street }}</td>
          <td>{{ $order->house }}</td>
          <td>{{ $order->flat }}</td>
          <td>
            <a href="/order/{{ $order->id }}" class="btn btn-info">
              Items
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
