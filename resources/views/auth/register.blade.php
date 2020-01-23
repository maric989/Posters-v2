@extends('welcome')
@section('content')
    <form action="{{route('register_user')}}" method="POST">
        {{csrf_field()}}
        <div class="col-sm-12 border-right">
            <h2>    Registration
            </h2>
            @if ($errors->has('email'))
                <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Email:</span>
                <input type="text" class="form-control" name="email">
            </div>
            @if ($errors->has('name'))
                <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Username:</span>
                <input type="text" class="form-control" name="name">
            </div>
            @if ($errors->has('password'))
                <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Password:</span>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="input-group">
                <span class="input-group-addon">Repeat Password:</span>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block custom-button"> Submit</button>

        </div>
    </form>
@endsection
