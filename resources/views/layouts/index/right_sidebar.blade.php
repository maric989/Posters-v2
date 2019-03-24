<aside class="col-sm-3">
    {{--<div class="widget">--}}
        {{--<h2>Search</h2>--}}
        {{--<hr/>--}}
        {{--<div class="widget-content">--}}
            {{--<div class="input-group search-widget">--}}
                {{--@if(strpos(Route::currentRouteName(),'poster') !== false)--}}
                    {{--<form action="{{route('search.poster')}}" method="POST" class="form-group">--}}
                        {{--{{csrf_field()}}--}}
                        {{--<input type="text"  placeholder="Search something" name="q" class="form-control"/>--}}
                          {{--<button class="btn btn-primary custom-button" type="submit">Search</button>--}}
                    {{--</form>--}}
                {{--@else--}}
                    {{--<form action="{{route('search.definition')}}" method="POST" class="form-group">--}}
                        {{--{{csrf_field()}}--}}
                        {{--<input type="text"  placeholder="Search something" name="q" class="form-control"/>--}}
                        {{--<button class="btn btn-primary custom-button" type="submit">Search</button>--}}
                    {{--</form>--}}
                {{--@endif--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="widget">
        <h2>Funkcionalnosti</h2>
        <hr />
        <div class="widget-content">
            @if(!Auth::user())
            <a data-toggle="modal" href="{{route('register')}}" class="btn btn-primary btn-lg btn-block custom-button">Register</a><br />
            <a data-toggle="modal" href="{{route('login')}}" class="btn btn-primary btn-lg btn-block custom-button">Login</a><br />
            @else
            {{--<a data-toggle="modal" href="#postModal" class="btn btn-primary btn-lg btn-block custom-button">Post Article</a>--}}
            <a href="{{route('create.poster')}}" class="btn btn-primary btn-lg btn-block custom-button">Kreiraj Poster</a>
            {{--<a href="{{route('create.definition')}}" class="btn btn-primary btn-lg btn-block custom-button">Kreiraj Definiciju</a>--}}
            {{--<a href="{{route('video_create')}}" class="btn btn-primary btn-lg btn-block custom-button">Dodaj Video</a>--}}
            @endif

        </div>
    </div>
    <div class="widget">
        <h2>Najbolji Autor</h2>
        <hr/>
        <div class="widget-content">
            <div class="joker">
                <a href="{{url('user/'.$topAuthor->slug)}}">
                    <figure>
                        <img src="{{(empty($author->profile_photo)? env('DEFAULT_PROFILE_IMG_LINK') : $author->profile_photo)}}" alt=""/>
                    </figure>
                </a>
                <div class="text">
                    <div class="name"><a href="{{url('user/'.$topAuthor->slug)}}">{{$topAuthor->name}}</a></div>
                    <div class="likes">{{$topAuthor->countLikesDiff($topAuthor->id)}} Lajkova</div>
                </div>
                <a href="profile.html" class="btn btn-primary btn-block custom-button">{{$topAuthor->name}}</a>
            </div>
        </div>
    </div>
    <div class="widget">
        <h2><a href="#">Top5 Svih vremena</a></h2>
        <hr />
        <div class="widget-content">
            <div class="post-list">

                @foreach(\App\Poster::getHighestRankedPoster() as $top_poster)
                <article>
                    <figure>
                        <img src="{{$top_poster->image}}" alt=""/>
                        {{--<figcaption>01</figcaption>--}}
                    </figure>
                    <div class="text">
                        <h3><a href="#">{{$top_poster->title}}</a></h3>
                        <h3><a href="#">{{$top_poster->user->name}}</a></h3>
                        <span class="date">{{$top_poster->created_at->format('d/m/y')}}</span>
                    </div>
                </article>
               @endforeach
            </div>
        </div>
    </div>
    <div class="widget">
        <h2>Find us on Facebook</h2>
        <hr />
        <div class="widget-content">
            <div class="fb-like-box" data-href="https://www.facebook.com/TeoThemes" data-width="165" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
        </div>
    </div>
</aside>
