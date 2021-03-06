@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit item') }}</div>

        <div class="card-body">
          <form method="POST"
           action="/admin/items/{{ $item->id }}">
              @csrf
              @method('patch')

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                {{ __('Name') }}
              </label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control
                 @error('name') is-invalid @enderror" name="name"
                 value="{{ old('name') ?? $item->name }}" required
                 autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">
                {{ __('price') }}
              </label>

              <div class="col-md-6">
                <input id="price" type="number" class="form-control
                 @error('price') is-invalid @enderror" name="price"
                 value="{{ old('price') ?? $item->price }}" required
                 autocomplete="price" autofocus>

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="supplier_id"
               class="col-md-4 col-form-label text-md-right">
                {{ __('Supplier') }}
              </label>

              <div class="col-md-6">
                <select selected value="{{ $item->supplier->id }}"
                  name="supplier_id" id="supplier_id" class="form-control">
                  <option value="{{ $item->supplier->id }}">
                    {{ $item->supplier->name }}
                  </option>
                  @foreach($suppliers as $supplier)
                  @if($supplier->id != $item->supplier->id)
                  <option value="{{ $supplier->id }}">
                    {{ $supplier->name }}
                  </option>
                  @endif
                  @endforeach
                </select>

                @error('supplier_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="category_id" class="col-md-4 col-form-label text-md-right">
                {{ __('Category') }}
              </label>

              <div class="col-md-6">
                <select selected value="{{ $item->category->id }}"
                  name="category_id" id="category_id" class="form-control">
                  <option value="{{ $item->category->id }}">
                    {{ $item->category->name }}
                  </option>
                  @foreach($categories as $category)
                  @if($category->id != $item->category->id)
                  <option value="{{ $category->id }}">
                    {{ $category->name }}
                  </option>
                  @endif
                  @endforeach
                </select>

                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
                <a href="/admin/items" class="btn btn-danger"
                   role="button">
                   Cancel
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
