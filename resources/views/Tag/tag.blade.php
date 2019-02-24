@extends('welcome')

@section('content')

    <h3>Tag <span style="color: red">{{$tag->name}}</span></h3>
    @foreach($posters as $poster)
        
        @include('poster.template.poster')

    @endforeach
@endsection
