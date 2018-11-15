<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="top-ten">
            <div class="activator">
                <div class="left">
                    <span class="small">Top</span>
                    <span class="small">All</span>
                    <span class="small">Time</span>
                </div>
                <div class="right">5</div>
            </div>
            <div class="drop-down">
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
                            <h3><a href="post.html">Helping the elderly is not fun...</a></h3>
                            <span class="date">25.04</span>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <a class="navbar-brand" href="/">
            <img src="{{asset('aruna/img/logo.png')}}" alt="Aruna - Image Sharing, Gag, Meme Theme"/>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Posteri <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="index2.html">Top</a></li>
                    <li><a href="index3.html">Trending</a></li>
                    <li><a href="index4.html">Svezi</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Definicije <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="category.html">Top</a></li>
                    <li><a href="post.html">Trending</a></li>
                    <li><a href="profile.html">Sveze</a></li>
                </ul>
            </li>
            <li><a href="#">Autori</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">About Us</a></li>
                    <li class="has-dropdown">
                        <a href="#">Contact</a>
                        <ul>
                            <li><a href="#">Our People</a></li>
                            <li class="has-dropdown">
                                <a href="#">Our Address</a>
                                <ul>
                                    <li><a href="#">Google Maps</a></li>
                                    <li><a href="#">Text Address</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Our Emails</a></li>
                            <li><a href="#">Job Offerings</a></li>
                            <li><a href="#">Communication</a></li>
                            <li><a href="#">Communication</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Shortcodes</a></li>
                    <li><a href="#">Feeatures</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="right-container">
        <div class="user-box">
            <a href="#">
                <figure>
                    <img src="{{asset('aruna/img/user-box.png')}}" alt=""/>
                </figure>
                @if(Auth::user())
                    <span class="name">{{Auth::user()->name}}</span>
                @else
                    <span class="name">Welcome</span>
                @endif
            </a>
            @if(Auth::user())
                <div class="drop-down">
                    <div class="counters-line">
                        <div class="half"><span class="counter">321k</span><span class="desc">Lajkovi</span></div>
                        <div class="half"><span class="counter">42</span><span class="desc">Postovi</span></div>
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
        <div class="social-share">
            <a href="#" class='share'>share</a>
            <ul class="drop-down">
                <li class="twitter"><a target="_blank" href="http://twitter.com/teothemes">twitter</a></li>
                <li class="dribble"><a target="_blank" href="http://dribbble.com/teothemes">dribble</a></li>
                <li class="googleplus"><a target="_blank" href="http://plus.google.com">googleplus</a></li>
                <li class="evernote"><a target="_blank" href="http://evernote.com">evernote</a></li>
                <li class="facebook"><a target="_blank" href="http://facebook.com/teothemes">facebook</a></li>
                <li class="linkedin"><a target="_blank" href="http://linkedin.com">linkedin</a></li>
                <li class="stumbleupon"><a target="_blank" href="http://www.stumbleupon.com/">stumbleupon</a></li>
                <li class="vimeo"><a target="_blank" target="_blank" href="http://vimeo.com/">vimeo</a></li>
                <li class="pinterest"><a target="_blank" href="http://pinterest.com/">pinterest</a></li>
            </ul>
        </div>
    </div>
</nav>
