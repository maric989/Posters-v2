@extends('welcome')

@section('content')
    <div class="post-window window-quote">
        <form action="{{route('store.definition')}}" method="POST">
            {{csrf_field()}}
            <div class="window-left">
                <h2> Kreiraj definiciju</h2>
                @if ($errors->has('title'))
                    <span>
                    <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                <input type="text" class="form-control text"  name="title" placeholder="Naslov...">
                <br>
                @if ($errors->has('body'))
                    <span>
                    <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
                <textarea class="form-control quote-input" rows="3" placeholder="“Definicija”" name="body"></textarea>
            </div>
            <aside>
                <div class="outer">
                    <div class="inner">
                        <div class="custom-checkbox">
                            <input type="checkbox" value="check1" name="check" id="check13" checked />
                            <label for="check13">NSFW</label>
                        </div>
                        {{--<div class="custom-checkbox">--}}
                            {{--<input type="checkbox" value="check1" name="check" id="check14" />--}}
                            {{--<label for="check14">COMMENTS</label>--}}
                        {{--</div>--}}
                        {{--<div class="custom-checkbox">--}}
                            {{--<input type="checkbox" value="check1" name="check" id="check15" />--}}
                            {{--<label for="check15">ANONYMOUS</label>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="tags-wrap">
                    <h3>Tags:</h3>
                    <input name="tags" class="tags-selector"/>
                </div>
            </aside>
            <button type="submit" class="btn btn-primary btn-lg btn-block custom-button" style="margin-top: 10px">Kreiraj definiciju</button>
        </form>
    </div>
@endsection