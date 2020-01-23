@extends('layouts.settings_template')

@section('content')
    <section id="main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 right-content profile-bg">
                    <div class="row">
                        @if($user->cover_photo)
                            <div class="profile-wrap" style="background-image: url('{{asset($user->cover_photo)}}');">
                        @else
                            <div class="profile-wrap" style="background-image: url('{{asset('aruna/img/user-cover.jpg')}}');">
                        @endif
                            <div class="col-sm-12">
                                <div class="outer">
                                    <div class="inner">
                                        <figure>
                                            @if($user->profile_photo)
                                                <img src="{{asset($user->profile_photo)}}" alt=""/>
                                            @else
                                                <img src="{{config('settings.default_profile_image')}}" alt=""/>
                                            @endif
                                        </figure>
                                        <div class="text">
                                            <div class="outer">
                                                <div class="inner">
                                                    <a href="#" class="user-name">{{$user->name}}</a>
                                                    <div class="counters">Clan od:</div>
                                                    <div class="counters">{{$user->created_at->diffForHumans()}}</div>
                                                </div>
                                                <div class="counter-item" style="margin-right: 30px">
                                                    <span class="number">{{$user->getPostersCount() + $user->getDefinitionCount()}}</span><br/>
                                                    <span class="exp">Posta</span>
                                                    <span class="number">{{$user->countLikesDiff()}}</span><br/>
                                                    <span class="exp">Likes</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        {{--Posts--}}
                    <div class="row">
                        <div class="col-sm-11 offset-sm-2">
                            <div class="main-wrap">
                                <h1>Postovi od {{$user->name}}</h1>
                                <div class="separator"></div>

                                <!-- Tab content -->
                                <div id="London" class="tabcontent" style="display: block">
                                    @foreach($posters as $poster)
                                        @include('poster.template.poster')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{--<aside class="col-sm-3">--}}
                            {{--<div class="widget">--}}
                                {{--<h2>Funnies Joker</h2>--}}
                                {{--<hr />--}}
                                {{--<div class="widget-content">--}}
                                    {{--<div class="joker">--}}
                                        {{--<figure>--}}
                                            {{--<img src="#" alt=""/>--}}
                                        {{--</figure>--}}
                                        {{--<div class="text">--}}
                                            {{--<div class="name"><a href="profile.html">Liam McLean</a></div>--}}
                                            {{--<div class="likes">234910 kudos</div>--}}
                                        {{--</div>--}}
                                        {{--<a href="profile.html" class="btn btn-primary btn-block custom-button">See Liam's Profile</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="widget">--}}
                                {{--<h2><a href="#">Top10 Funniest</a></h2>--}}
                                {{--<hr />--}}
                                {{--<div class="widget-content">--}}
                                    {{--<div class="post-list">--}}
                                        {{--<article>--}}
                                            {{--<figure>--}}
                                                {{--<img src="img/top1.jpg" alt=""/>--}}
                                                {{--<figcaption>01</figcaption>--}}
                                            {{--</figure>--}}
                                            {{--<div class="text">--}}
                                                {{--<h3><a href="post.html">Helping the elderly is not fun...</a></h3>--}}
                                                {{--<span class="date">25.04</span>--}}
                                            {{--</div>--}}
                                        {{--</article>--}}
                                        {{--<article>--}}
                                            {{--<figure>--}}
                                                {{--<img src="img/top2.jpg" alt=""/>--}}
                                                {{--<figcaption>02</figcaption>--}}
                                            {{--</figure>--}}
                                            {{--<div class="text">--}}
                                                {{--<h3><a href="post.html">Old people burning...</a></h3>--}}
                                                {{--<span class="date">25.04</span>--}}
                                            {{--</div>--}}
                                        {{--</article>--}}
                                        {{--<article>--}}
                                            {{--<figure>--}}
                                                {{--<img src="img/top3.jpg" alt=""/>--}}
                                                {{--<figcaption>03</figcaption>--}}
                                            {{--</figure>--}}
                                            {{--<div class="text">--}}
                                                {{--<h3><a href="post.html">Inappropriate jokes are alway...</a></h3>--}}
                                                {{--<span class="date">23.04</span>--}}
                                            {{--</div>--}}
                                        {{--</article>--}}
                                        {{--<article>--}}
                                            {{--<figure>--}}
                                                {{--<img src="img/top4.jpg" alt=""/>--}}
                                                {{--<figcaption>04</figcaption>--}}
                                            {{--</figure>--}}
                                            {{--<div class="text">--}}
                                                {{--<h3><a href="post.html">The Law</a></h3>--}}
                                                {{--<span class="date">22.04</span>--}}
                                            {{--</div>--}}
                                        {{--</article>--}}
                                        {{--<article>--}}
                                            {{--<figure>--}}
                                                {{--<img src="img/top5.jpg" alt=""/>--}}
                                                {{--<figcaption>05</figcaption>--}}
                                            {{--</figure>--}}
                                            {{--<div class="text">--}}
                                                {{--<h3><a href="post.html">How Photoshop works</a></h3>--}}
                                                {{--<span class="date">22.04</span>--}}
                                            {{--</div>--}}
                                        {{--</article>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="widget">--}}
                                {{--<h2>Find us on Facebook</h2>--}}
                                {{--<hr />--}}
                                {{--<div class="widget-content">--}}
                                    {{--<div class="fb-like-box" data-href="https://www.facebook.com/TeoThemes" data-width="165" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</aside>--}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
