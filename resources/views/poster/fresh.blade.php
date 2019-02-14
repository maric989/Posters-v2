@extends('welcome')

@section('content')

    @foreach($posters as $poster)
        @include('poster.template.poster')
    @endforeach
    {{$posters->links()}}

@endsection
