@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h2 class="text-center">All Suppliers</h2>
  <div class="row justify-content-center">
    <a href="/admin/suppliers/create"
       class="btn btn-block mb-2 w-50 btn-primary"
       role="button">
       Add new Supplier
    </a>
  </div>
  <div class="row justify-content-center">
    <table class="table table-light text-center">
      <thead class="thead-dark">
        <th>#</th>
        <th>Name</th>
        <th>Country</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($suppliers as $supplier)
        <tr>
          <td>{{ $supplier->id }}</td>
          <td>{{ $supplier->name }}</td>
          <td>{{ $supplier->country->name }}</td>
          <td>
            <div class="row">
              <a href="/admin/suppliers/{{ $supplier->id }}/edit"
                 class="btn btn-block w-25 btn-info">
                Edit
              </a>
              <form action="/admin/suppliers/{{ $supplier->id }}"
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
