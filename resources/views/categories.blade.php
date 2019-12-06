@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h2 class="text-center">All Categories</h2>
  <div class="row justify-content-center">
    <a href="/admin/categories/create"
       class="btn btn-block mb-2 w-50 btn-primary"
       role="button">
       Add new Category
    </a>
  </div>
  <div class="row justify-content-center">
    <table class="table table-light text-center">
      <thead class="thead-dark">
        <th>#</th>
        <th>Name</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
          <td>
            <div class="row">
              <a href="/admin/categories/{{ $category->id }}/edit"
                 class="btn btn-block w-25 btn-info">
                Edit
              </a>
              <form action="/admin/categories/{{ $category->id }}"
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
