@extends('welcome')

@section('content')

@if(count($results) > 0)
    {{dd($results)}}
@else
    No
@endif

@endsection