@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <h2>All bought items</h2>
    <table class="table table-light text-center">
      <thead class="thead-dark">
        <th>#</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Price</th>
        <th></th>
      </thead>
      <tbody>
        @for($i = 0; $i < 3; $i++)
        <tr>
          <td>1</td>
          <td>
            <img src="https://images-na.ssl-images-amazon.com/images/I/71sBjbHYbKL._AC_SY200_.jpg"
            alt="no-image"/>
          </td>
          <td>Headphones</td>
          <td>15.00$</td>
          <td>
            <a href="#" class="btn btn-info">
              More Info
            </a>
          </td>
        </tr>
        @endfor
      </tbody>
    </table>
  </div>
</div>
@endsection
