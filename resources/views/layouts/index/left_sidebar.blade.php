<aside class="col-sm-2 left-aside">
    <div class="sidebar-menu">
        <div class="top-menu">
            {{--<div class="inception-menu">--}}
                {{--<a href="#" class="selector">Menu</a>--}}
                {{--<div class="sub-navigation">--}}
                    {{--<div class="half">--}}
                        {{--<a href="#" rel="sidebar-content-hot"><i class='icon-hot'></i> Hot Posts</a>--}}
                    {{--</div>--}}
                    {{--<div class="half">--}}
                        {{--<a href="#" rel="sidebar-content-bookmarks"><i class='icon-bookmarks'></i> Bookmarks</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="section-title">Tagovi</div>--}}
        </div>
        <div class="sidebar-content sidebar-content-category">
            <div class="menu-group">
                <h2><a href="#">Top Tagovi</a></h2>
                <hr />
                <ul>
                    @foreach($tags as $tag)
                        @foreach($tag as $a)
                            <li style="font-family: Roboto, Arial, sans-serif;"><a href="{{route('tags',$a->name)}}">{{$a->name}}</a></li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
            {{--<div class="menu-group">--}}
                {{--<h2><a href="category.html">Politics</a></h2>--}}
                {{--<hr />--}}
                {{--<ul>--}}
                    {{--<li><a href="category.html">Funny Politicians</a></li>--}}
                    {{--<li><a href="category.html">#ObamaStuff</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="menu-group">--}}
                {{--<h2><a href="category.html">Gingerfun</a></h2>--}}
                {{--<hr />--}}
                {{--<ul>--}}
                    {{--<li><a href="category.html">Ginger People</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="menu-group">--}}
                {{--<h2><a href="category.html">Cute</a></h2>--}}
                {{--<hr />--}}
                {{--<ul>--}}
                    {{--<li><a href="category.html">Cute Kittens</a></li>--}}
                    {{--<li><a href="category.html">Pandas</a></li>--}}
                    {{--<li><a href="category.html">Babies Garden</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
        <div class="sidebar-content sidebar-content-hot">
            <div class="side-article">
                <figure>
                    <a href="post.html">
                        <img src="img/left1.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">Old People Burning</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
            <div class="side-article">
                <figure>
                    <a href="post.html">
                        <img src="img/left2.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">How to get killed and revive in 3 days!</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
            <div class="side-article">
                <figure>
                    <a href="post.htmls">
                        <img src="img/left3.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">How Photoshop Really Works</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
            <div class="side-article">
                <figure>
                    <a href="post.html">
                        <img src="img/left4.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">Old People Burning</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
            <div class="side-article">
                <figure>
                    <a href="post.html">
                        <img src="img/left5.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">How to get killed and revive in 3 days!</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-content sidebar-content-bookmarks">
            <div class="side-article">
                <figure>
                    <a href="post.html">
                        <img src="img/left1.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">Old People Burning</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
            <div class="side-article">
                <figure>
                    <a href="post.html">
                        <img src="img/left2.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">How to get killed and revive in 3 days!</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
            <div class="side-article">
                <figure>
                    <a href="post.htmls">
                        <img src="img/left3.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">How Photoshop Really Works</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
            <div class="side-article">
                <figure>
                    <a href="post.html">
                        <img src="img/left4.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">Old People Burning</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
            <div class="side-article">
                <figure>
                    <a href="post.html">
                        <img src="img/left5.jpg" alt=""/>
                    </a>
                </figure>
                <h2><a href="post.html">How to get killed and revive in 3 days!</a></h2>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> 23.04</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">johnjsu</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="post.html">320</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
