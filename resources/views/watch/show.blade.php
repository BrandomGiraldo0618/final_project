@extends('home')

@section('title')Show Watch @endsection
@section('content')
<div class="row justify-content-center">
    <div class="card mb-3 shadow w-50">
        @isset($watch->watch_image)
            @if ($watch->watch_image == '')
                <img class="card-img-top" src="https://static.thenounproject.com/png/4209393-200.png" alt="Card image cap">
            @else
                <img class="card-img-top" src="{{asset($watch->watch_image)}}" alt="Card image cap" style="margin-left: 35%;width: 30%">
            @endif
        @else
            <img class="card-img-top" src="https://static.thenounproject.com/png/4209393-200.png" alt="Card image cap">
        @endisset
    
        <div class="card-body">
            <h5 class="card-title">{{$watch->watch_name}}</h5>
            <p class="card-text"><b>Description </b>{{$watch->watch_description}}</p>
            <p class="card-text"><small class="text-muted"><b>Created </b>{{$watch->created_at}}</small></p>
        </div>
        <div class="row mb-2">
            <div class="col" style="margin-left: 20px">
                <a class="btn btn-danger" href="/watches">
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection