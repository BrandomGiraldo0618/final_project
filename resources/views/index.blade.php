@extends('home')

@section('title') Categories @endsection
@section('content')
    <div class="row justify-content-center">
        @foreach ($watches as $watch)
            <div class="card mr-2 shadow" style="width: 18rem;">
                @isset($watch->watch_image)
                    @if ($watch->watch_image == '')
                        <img class="card-img-top mt-2" src="https://static.thenounproject.com/png/4209393-200.png" alt="Card image cap" style="margin-left: 28%;width: 120px;  height: 100px">
                    @else
                        <img class="card-img-top mt-2" src="{{asset($watch->watch_image)}}" alt="Card image cap" style="margin-left: 28%;width: 120px;  height: 100px">
                    @endif
                @else
                    <img class="card-img-top mt-2" src="https://static.thenounproject.com/png/4209393-200.png" alt="Card image cap" style="margin-left: 28%;width: 120px; height: 100px">
                @endisset
                <div class="card-body">
                    <h5 class="card-title">{{$watch->watch_name}}</h5>
                    <p class="card-text"><b>Description </b>{{$watch->watch_description}}</p>
                    <p class="card-text"><small class="text-muted"><b>Created </b>{{$watch->created_at}}</small></p>
                </div>
            </div>
        @endforeach
    </div>
@endsection