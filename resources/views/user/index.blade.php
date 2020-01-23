@extends('welcome')
@section('content')
    @include('layouts.flash_message')
    @if(!Auth::user())
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Ako se registrujete sve aktivnosti ce vam biti otkljucane</strong>
        <br>
        <strong>Registracija je besplatna</strong>
    </div>
    @endif
    @foreach($posters as $poster)
        @include('poster.template.poster')
    @endforeach
@endsection
