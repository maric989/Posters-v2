@extends('welcome')
@section('content')
    @include('layouts.flash_message')
    @foreach($posters as $poster)
        @include('poster.template.poster')
    @endforeach
@endsection
