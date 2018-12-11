@extends('admin.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="column">
            @foreach($posters as $poster)
                <div class="col-md-4">
                    <a href="{{route('admin_single_poster',$poster->id)}}">
                        <h3>{{$poster->title}}</h3>
                    </a>
                    <img src="{{$poster->image}}" class="img-thumbnail">
                    <br>
                    @if($poster->approved)
                        <button class="btn btn-success">Approved</button>
                    @else
                        <button class="btn btn-danger">Not Approved</button>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="row" style="text-align: center">
        {{$posters->links()}}
    </div>
</div>
@endsection