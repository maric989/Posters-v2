@extends('welcome')
@section('content')
    <h2>Login</h2>
    <form action="{{route('login')}}" method="POST">
        {{csrf_field()}}
        <div class="half-horizontal">
            @if ($errors->has('email'))
                <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Email:</span>
                <input type="text" class="form-control" name="email" value="{{old('email')}}">
            </div>
        </div>

        <div class="half-horizontal">
            @if ($errors->has('password'))
                <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Password:</span>
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block custom-button"> Login</button>
    </form>
@endsection
