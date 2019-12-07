@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h2 class="text-center">All Items</h2>
  <div class="row justify-content-center">
    <a href="/admin/items/create"
       class="btn btn-block mb-2 w-50 btn-primary"
       role="button">
       Add new Item
    </a>
  </div>
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
        @foreach($items as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->category->name }}</td>
          <td>{{ $item->price }}$</td>
          <td>{{ $item->supplier->name }}</td>
          <td>
            <div class="row">
              <a href="/admin/items/{{ $item->id }}/edit"
                 class="btn btn-block w-25 btn-info">
                Edit
              </a>
              <form action="/admin/items/{{ $item->id }}"
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
