@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit Supplier') }}</div>

        <div class="card-body">
          <form method="POST"
           action="/admin/suppliers/{{ $supplier->id }}">
              @csrf
              @method('patch')

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                {{ __('Name') }}
              </label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control
                 @error('name') is-invalid @enderror" name="name"
                 value="{{ old('name') ?? $supplier->name }}" required
                 autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="country_id" class="col-md-4 col-form-label text-md-right">
                {{ __('Country') }}
              </label>

              <div class="col-md-6">
                <select name="country_id" id="country_id"
                 selected value="{{ $supplier->country->id }}"
                 class="form-control">
                  <option value="{{ $supplier->country->id }}">
                    {{ $supplier->country->name }}
                  </option>
                  @foreach($countries as $country)
                  @if($country->id != $supplier->country->id)
                  <option value="{{ $country->id }}">
                    {{ $country->name }}
                  </option>
                  @endif
                  @endforeach
                </select>

                @error('country_id')
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
                <a href="/admin/suppliers" class="btn btn-danger"
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
