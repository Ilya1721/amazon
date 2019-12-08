@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Put your address info here') }}</div>

        <div class="card-body">
          <form method="POST"
           action="/cart/pay">
              @csrf

            <div class="form-group row">
              <label for="state" class="col-md-4 col-form-label text-md-right">
                {{ __('State') }}
              </label>

              <div class="col-md-6">
                <input id="state" type="text" class="form-control
                 @error('state') is-invalid @enderror" name="state"
                 value="{{ old('state') }}" required
                 autocomplete="state" autofocus>

                @error('state')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="city" class="col-md-4 col-form-label text-md-right">
                {{ __('City') }}
              </label>

              <div class="col-md-6">
                <input id="city" type="text" class="form-control
                 @error('city') is-invalid @enderror" name="city"
                 value="{{ old('city') }}" required
                 autocomplete="city" autofocus>

                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="street" class="col-md-4 col-form-label text-md-right">
                {{ __('Street') }}
              </label>

              <div class="col-md-6">
                <input id="street" type="text" class="form-control
                 @error('street') is-invalid @enderror" name="street"
                 value="{{ old('street') }}" required
                 autocomplete="street" autofocus>

                @error('street')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="house" class="col-md-4 col-form-label text-md-right">
                {{ __('House') }}
              </label>

              <div class="col-md-6">
                <input id="house" type="text" class="form-control
                 @error('house') is-invalid @enderror" name="house"
                 value="{{ old('house') }}" required
                 autocomplete="house" autofocus>

                @error('house')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="flat" class="col-md-4 col-form-label text-md-right">
                {{ __('Flat') }}
              </label>

              <div class="col-md-6">
                <input id="flat" type="text" class="form-control
                 @error('flat') is-invalid @enderror" name="flat"
                 value="{{ old('flat') }}" required
                 autocomplete="flat" autofocus>

                @error('flat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="phone_number" class="col-md-4 col-form-label text-md-right">
                {{ __('Phone number') }}
              </label>

              <div class="col-md-6">
                <input id="phone_number" type="text" class="form-control
                 @error('phone_number') is-invalid @enderror"
                 name="phone_number"
                 value="{{ old('phone_number') }}" required
                 autocomplete="phone_number" autofocus>

                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Buy') }}
                </button>
                <a href="/cart" class="btn btn-danger"
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
