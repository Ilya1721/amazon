@extends('layouts.app')
@section('content')
<div id="bg-image">

</div>
<div class="container my-5">
  <h2 class="text-center">All items available</h2>
  <div class="row d-flex justify-content-center my-3">
    <form action="/welcome/filter" method="GET" class="form-inline mr-3">
      @csrf
      <div class="input-group">
        <select name="category" class="form-control">
          @foreach($categories as $category)
          <option value="{{ $category->id }}">
            {{ $category->name }}
          </option>
          @endforeach
          <option value="all">
            All categories
          </option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-success" type="submit">
            Filter<span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </form>
    <form action="/welcome/filter" method="GET" class="form-inline mr-3">
      @csrf
      <div class="input-group">
        <select name="category" class="form-control">
          @foreach($suppliers as $supplier)
          <option value="{{ $supplier->id }}">
            {{ $supplier->name }}
          </option>
          @endforeach
          <option value="all">
            All suppliers
          </option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-success" type="submit">
            Filter<span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </form>
    <form action="/welcome/search" method="GET"
     class="form-inline w-25 mr-3">
      @csrf
      <div class="input-group">
        <select name="category" class="form-control">
          <option value="items.name">Name</option>
        </select>
        <input id="search" name="search"
         class="form-control w-50 input-group-append"
         type="text" placeholder="Search"
         aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-success" type="submit">
            Find<span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </form>
    <form action="/welcome/sort" method="GET" class="form-inline">
      @csrf
      <div class="input-group">
        <select name="rule" class="form-control w-25">
          <option value="DESC">Descending</option>
          <option value="ASC">Ascending</option>
          <option value="NOSORT">No sorting</option>
        </select>
        <select name="category" class="form-control input-group-append w-25">
          <option value="price">Price</option>
          <option value="items.name">Alphabetically</option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-success" type="submit">
            Sort<span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </form>
  </div>
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
          <a href="/item/{{ $item->id }}/addToCart"
             class="btn btn-primary">
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
