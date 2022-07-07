@extends('home')

@section('title') Watch @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-5 shadow p-3 mb-5 bg-body rounded mt-2">
        <table class="table table-hover">
            <thead>
                <th class="table-light border">IMAGE</th>
                <th class="table-light border">NAME</th>
                <th class="table-light border">DESCRIPTION</th>
                <th class="table-light border" colspan="3">OPTIONS</th>
            </thead>
            <tbody>
                @foreach ($watches as $watch)
                    <tr>
                        <td class="border">
                            @isset($watch->watch_image)
                                @if ($watch->watch_image == '')
                                    <img class="img-fluid rounded-start" src="https://static.thenounproject.com/png/4209393-200.png" style="width: 100%; height: 60%;">                                    
                                @else
                                    <img class="img-fluid rounded-start" src="{{asset($watch->watch_image)}}" style="width: 100px; height: 100px;">
                                @endif
                            @else
                                <img class="img-fluid rounded-start" src="https://static.thenounproject.com/png/4209393-200.png" style="width: 100%; height: 60%;">
                            @endisset
                        </td>
                        <td class="border">
                            {{$watch->watch_name}}
                        </td>
                        <td class="border">
                            {{$watch->watch_description}}
                        </td>
                        <td class="border">
                            <a class="btn btn-success" style="padding: 5px" href="/watches/{{$watch->slug}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </a>
                        </td>
                        <td class="border">
                            <a class="btn btn-info" style="padding: 5px" href="/watches/{{$watch->slug}}/edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                        </td>
                        <td class="border">
                            <form method="POST" action="/watches/{{$watch->slug}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" style="padding: 5px" onclick="return confirm('Are you sure to remove {{$watch->watch_name}}?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="col-5 shadow p-3 mb-5 bg-body rounded mt-2">
        <div class="alert alert-primary" role="alert">
          <h5>Create Watch</h5>
        </div>

        <form method="POST" action="/watches" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="watch_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="watch_name" type="text" class="form-control @error('watch_name') is-invalid @enderror" name="watch_name" value="{{ old('watch_name') }}" autofocus>
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
                    <textarea class="form-control @error('watch_description') is-invalid @enderror"  style="margin-top: 0px;margin-bottom: 0px;height: 192px;" id="watch_description" name="watch_description" >{{old('watch_description')}}</textarea>

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
                    <input id="watch_material" type="text" class="form-control @error('watch_material') is-invalid @enderror" name="watch_material" value="{{ old('watch_material') }}" autofocus>

                    @error('watch_material')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                <div class="col-md-6">
                    <select class="form-control" id="category_id" name="category_id">
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
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection