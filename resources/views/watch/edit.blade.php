@extends('home')

@section('title')Edit Watch @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-5 shadow p-3 mb-5 bg-body rounded mt-2">
        <div class="alert alert-primary" role="alert">
          <h5>Edit Watch</h5>
        </div>

        <form method="POST" action="/watches/{{$watch->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="watch_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="watch_name" type="text" class="form-control @error('watch_name') is-invalid @enderror" name="watch_name" value="{{ old('watch_name', $watch->watch_name) }}" autofocus>

                    @error('watch_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="watch_image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                <div class="col-md-6">
                    <input id="watch_image" type="file" class="form-control @error('watch_image') is-invalid @enderror" name="watch_image" value="{{ old('watch_image') }}" autofocus>
                    @error('watch_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="watch_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <textarea class="form-control @error('watch_description') is-invalid @enderror"  style="margin-top: 0px;margin-bottom: 0px;height: 192px;" id="watch_description" name="watch_description" >{{old('watch_description',$watch->watch_description)}}</textarea>

                    @error('watch_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="watch_material" class="col-md-4 col-form-label text-md-right">{{ __('Material') }}</label>

                <div class="col-md-6">
                    <input id="watch_material" type="text" class="form-control @error('watch_material') is-invalid @enderror" name="watch_material" value="{{ old('watch_material', $watch-> watch_material) }}" autofocus>

                    @error('watch_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                <div class="col-md-6">
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                        <option >Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                <div class="col-md-3 offset-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Save') }}
                    </button>
                </div>
                <div class="col-md-3 offset-md-2">
                    <a class="btn btn-danger w-100" href="/watches">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection