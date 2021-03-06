@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit Country') }}</div>

        <div class="card-body">
          <form method="POST"
           action="/admin/countries/{{ $country->id }}">
              @csrf
              @method('patch')

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                {{ __('Name') }}
              </label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control
                 @error('name') is-invalid @enderror" name="name"
                 value="{{ old('name') ?? $country->name }}" required
                 autocomplete="name" autofocus>

                @error('name')
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
                <a href="/admin/countries" class="btn btn-danger"
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
