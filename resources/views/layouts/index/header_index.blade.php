<nav class="navbar navbar-default" role="navigation" style="background-color: black">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-logo" href="/">
            {{--<img src="{{asset('aruna/img/logo.png')}}" alt="Aruna - Image Sharing, Gag, Meme Theme"/>--}}
            {{--<img src="https://c7.uihere.com/files/557/258/473/rubik-s-cube-3d-free-jigsaw-puzzles-professor-s-cube-cube-thumb.jpg">--}}
            {{--<p style="color: white;font-weight: 800">ED<br>EN</p>--}}
            <span>ED</span> <br>
            <span>EN</span>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{url('/')}}" class="dropdown-toggle" style="background-color: black" data-toggle="dropdown">Posteri <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('/')}}">Top</a></li>
                    <li><a href="{{route('poster.trending')}}">Trending</a></li>
                    <li><a href="{{route('poster.fresh')}}">Svezi</a></li>
                </ul>
            </li>
            @if($definition_enabled)
            <li>
                <a href="{{route('index.definition')}}" class="dropdown-toggle" data-toggle="dropdown">Definicije <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('index.definition')}}">Top</a></li>
                    <li><a href="{{route('trending.definition')}}">Trending</a></li>
                    <li><a href="{{route('fresh.definition')}}">Sveze</a></li>
                </ul>
            </li>
            @endif
            <li><a href="/autori">Autori</a></li>
            {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="#">About Us</a></li>--}}
                    {{--<li class="has-dropdown">--}}
                        {{--<a href="#">Contact</a>--}}
                        {{--<ul>--}}
                            {{--<li><a href="#">Our People</a></li>--}}
                            {{--<li class="has-dropdown">--}}
                                {{--<a href="#">Our Address</a>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="#">Google Maps</a></li>--}}
                                    {{--<li><a href="#">Text Address</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Our Emails</a></li>--}}
                            {{--<li><a href="#">Job Offerings</a></li>--}}
                            {{--<li><a href="#">Communication</a></li>--}}
                            {{--<li><a href="#">Communication</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#">Shortcodes</a></li>--}}
                    {{--<li><a href="#">Feeatures</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </div>
    <div class="right-container">
        <div class="user-box" style="background-color: black">
                @if(Auth::user())
                    <div class="user-box-image">
                        <img src="{{(!is_null(Auth::user()->profile_photo))? Auth::user()->profile_photo : asset('aruna/img/user-box.png')}}" alt="" class="img-bordered"/>
                    </div>
                    <div style="width: 70%; float: left; color: white; margin-top: 7px">
                        <h3>{{Auth::user()->name}}</h3>
                    </div>
                @else
                    <div id="loginButtons" style="float: left; margin-left: 25px">
                        <a href="{{url('/login')}}" class="btn btn" style="background-color: #7f46dd; color: white">Prijavi se</a>
                    </div>
                    <div>
                        <a href="{{url('/register')}}" class="btn btn" style="background-color: #7f46dd; color: white">Registruj se</a>
                    </div>
            @endif
            @if(Auth::user())
                <div class="drop-down">
                    <div class="counters-line">
                        <div class="half"><span class="counter">{{Auth::user()->countLikesDiff()}}</span><span class="desc">Lajkova</span></div>
                        <div class="half"><span class="counter">{{Auth::user()->posters->where('approved','1')->count()}}</span><span class="desc">Posta</span></div>
                    </div>
                    <div class="buttons-line">
                        <a href="{{route('user.profile',Auth::user()->slug)}}" class="btn btn-primary btn-block custom-button">Profil</a>
                        <a href="{{route('user.settings')}}" class="btn btn-primary btn-block custom-button">Podesavanja</a>
                        <form action="{{route('logout')}}" method="POST">
                            {{csrf_field()}}
                            <button class="btn btn-primary btn-block custom-button">Logout</button>
                        </form>

                    </div>
                </div>
            @endif
        </div>
        {{--<div class="social-share">--}}
            {{--<a href="#" class='share'>share</a>--}}
            {{--<ul class="drop-down">--}}
                {{--<li class="twitter"><a target="_blank" href="http://twitter.com/teothemes">twitter</a></li>--}}
                {{--<li class="dribble"><a target="_blank" href="http://dribbble.com/teothemes">dribble</a></li>--}}
                {{--<li class="googleplus"><a target="_blank" href="http://plus.google.com">googleplus</a></li>--}}
                {{--<li class="evernote"><a target="_blank" href="http://evernote.com">evernote</a></li>--}}
                {{--<li class="facebook"><a target="_blank" href="http://facebook.com/teothemes">facebook</a></li>--}}
                {{--<li class="linkedin"><a target="_blank" href="http://linkedin.com">linkedin</a></li>--}}
                {{--<li class="stumbleupon"><a target="_blank" href="http://www.stumbleupon.com/">stumbleupon</a></li>--}}
                {{--<li class="vimeo"><a target="_blank" target="_blank" href="http://vimeo.com/">vimeo</a></li>--}}
                {{--<li class="pinterest"><a target="_blank" href="http://pinterest.com/">pinterest</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>
</nav>

