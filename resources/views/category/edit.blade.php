@extends('home')

@section('title')Edit Category @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-5 shadow p-3 mb-5 bg-body rounded mt-2">
        <div class="alert alert-primary" role="alert">
            <h5>Edit Category</h5>
        </div>

      <form method="POST" action="/categories/{{$category->id}}">
          @csrf
          @method('PUT')
          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $category->name) }}" autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

              <div class="col-md-6">
                  <textarea class="form-control @error('description') is-invalid @enderror"  style="margin-top: 0px;margin-bottom: 0px;height: 192px;" id="description" name="description" >{{old('description', $category->description)}}</textarea>

                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>

              <div class="col-md-6">
                  <input id="priority" type="number" class="form-control @error('priority') is-invalid @enderror" name="priority" min="1" max="10" value="{{old('priority', $category->priority)}}">

                  @error('priority')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-3 offset-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Save') }}
                </button>
            </div>
            <div class="col-md-3 offset-md-2">
                <a class="btn btn-danger w-100" href="/categories">
                    {{ __('Back') }}
                </a>
            </div>
        </div>
      </form>
  </div>
</div>
@endsection