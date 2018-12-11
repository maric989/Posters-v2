@extends('admin.admin')
@section('content')
    <div class="container">
        <h1 style="text-align: center"> <span style="color: green">Approved</span> Posters</h1>
        <div class="row">
            <div class="column">
                @foreach($posters as $poster)
                    <div class="col-md-4">
                        <a href="{{route('admin_single_poster',$poster->id)}}">
                            <h3>{{$poster->title}}</h3>
                        </a>
                        <img src="{{$poster->image}}" class="img-thumbnail">
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row" style="text-align: center">
            {{$posters->links()}}
        </div>
    </div>
@endsection