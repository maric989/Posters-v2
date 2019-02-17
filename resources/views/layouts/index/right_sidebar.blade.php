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
        @dd(\App\Poster::getHighestRankedPoster())
        <hr />
        <div class="widget-content">
            <div class="joker">
                <figure>
                    <img src="img/avatar01.jpg" alt=""/>
                </figure>
                <div class="text">
                    <div class="name"><a href="profile.html">Liam McLean</a></div>
                    <div class="likes">234910 kudos</div>
                </div>
                <a href="profile.html" class="btn btn-primary btn-block custom-button">See Liam's Profile</a>
            </div>
        </div>
    </div>
    <div class="widget">
        <h2><a href="#">Top5 Funniest</a></h2>
        <hr />
        <div class="widget-content">
            <div class="post-list">
                <article>
                    <figure>
                        <img src="img/top1.jpg" alt=""/>
                        <figcaption>01</figcaption>
                    </figure>
                    <div class="text">
                        <h3><a href="post.html">Helping the elderly is not fun...</a></h3>
                        <span class="date">25.04</span>
                    </div>
                </article>
                <article>
                    <figure>
                        <img src="img/top2.jpg" alt=""/>
                        <figcaption>02</figcaption>
                    </figure>
                    <div class="text">
                        <h3><a href="post.html">Old people burning...</a></h3>
                        <span class="date">25.04</span>
                    </div>
                </article>
                <article>
                    <figure>
                        <img src="img/top3.jpg" alt=""/>
                        <figcaption>03</figcaption>
                    </figure>
                    <div class="text">
                        <h3><a href="post.html">Inappropriate jokes are alway...</a></h3>
                        <span class="date">23.04</span>
                    </div>
                </article>
                <article>
                    <figure>
                        <img src="img/top4.jpg" alt=""/>
                        <figcaption>04</figcaption>
                    </figure>
                    <div class="text">
                        <h3><a href="post.html">The Law</a></h3>
                        <span class="date">22.04</span>
                    </div>
                </article>
                <article>
                    <figure>
                        <img src="img/top5.jpg" alt=""/>
                        <figcaption>05</figcaption>
                    </figure>
                    <div class="text">
                        <h3><a href="post.html">How Photoshop works</a></h3>
                        <span class="date">22.04</span>
                    </div>
                </article>
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
