@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Create Supplier') }}</div>

        <div class="card-body">
          <form method="POST"
           action="/admin/suppliers">
              @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                {{ __('Name') }}
              </label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control
                 @error('name') is-invalid @enderror" name="name"
                 value="{{ old('name') }}" required
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
                {{ __('country_id') }}
              </label>

              <div class="col-md-6">
                <select name="country_id" id="country_id" class="form-control">
                  @foreach($countries as $country)
                  <option value="{{ $country->id }}">
                    {{ $country->name }}
                  </option>
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
