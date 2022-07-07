@extends('home')

@section('title') category @endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-5 shadow p-3 mb-5 bg-body rounded mt-2">
            <table class="table table-hover">
                <thead>
                    <th class="table-light border">ID</th>
                    <th class="table-light border">NAME</th>
                    <th class="table-light border">DESCRIPTION</th>
                    <th class="table-light border" colspan="2">OPTIONS</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="border">
                                {{$category->id}}
                            </td>
                            <td class="border">
                                {{$category->name}}
                            </td>
                            <td class="border">
                                {{$category->description}}
                            </td>
                            <td class="border">
                                <a class="btn btn-info" style="padding: 5px" href="/categories/{{$category->slug}}/edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </a>
                            </td>
                            <td class="border">
                                <form method="POST" action="/categories/{{$category->slug}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" style="padding: 5px" onclick="return confirm('Are you sure to remove {{$category->name}}?')">
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
              <h5>Create Category</h5>
            </div>

            <form method="POST" action="/categories">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

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
                        <textarea class="form-control @error('description') is-invalid @enderror"  style="margin-top: 0px;margin-bottom: 0px;height: 192px;" id="description" name="description" >{{old('description')}}</textarea>

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
                        <input id="priority" type="number" class="form-control @error('priority') is-invalid @enderror" name="priority" min="1" max="10">

                        @error('priority')
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