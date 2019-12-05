@extends('layouts.app')
@section('content')
<div id="bg-image">

</div>
<div class="container my-5">
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
          <a href="#" class="btn btn-primary">
            Add to Cart
          </a>
          <a href="#" class="btn btn-info">
            More Info
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
