@extends('welcome')
@section('content')
    @include('layouts.flash_message')
    @foreach($posters as $poster)
        @if(($poster->likes->pluck('up')->sum()) >=6 )
            <article class="main-post">
            <div class="article-top">
                <h1><a href="{{route('single.poster',[$poster->slug,$poster->id])}}">{{$poster->title}}</a></h1>
                <hr />
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> {{$poster->created_at->diffForHumans()}}</div>
                        <div class="user"><i class="icon-user"></i> <a href="{{route('user.profile',$poster->user->slug)}}">{{$poster->user->name}}</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="{{route('single.poster',[$poster->slug,$poster->id])}}">{{$comments->where('post_id',$poster->id)->where('comm_type','App\Poster')->count()}}</a></div>
                    </div>
                    <div class="pull-right">
                        <input type="hidden" value="{{$poster->id}}" id="poster_id">
                        <a href="#"><i class="icon-like upvote_poster"></i><span class="countUp">100</span></a>

                        <div class="dislike"><a href="#"><i class="icon-dislike"></i> 32</a></div>
                    </div>
                </div>
                <div class="buttons-bar">
                    <div class="buttons">
                        <a href="#" class='repost has-tooltip' data-title="REPOST">Repost</a>
                        <a href="#" class='bookmarked has-tooltip' data-title="BOOKMARKED">bookmarked</a>
                        <div class="count">{{$poster->likes->pluck('up')->sum() - $poster->likes->pluck('down')->sum()}}</div>
                    </div>
                    <div class="social-icons">
                        <a href="javascript:void(0)" data-href="https://www.facebook.com/sharer/sharer.php?u=http://teothemes.com/html/Aruna" class='facebook has-tooltip' data-title="Share on Facebook">facebook</a>
                        <a href="javascript:void(0)" data-href="https://twitter.com/intent/tweet?source=tweetbutton&amp;text=Check the best image/meme sharing website!&url=http://teothemes.com/html/Aruna" class='twitter has-tooltip' data-title="Share on Twitter">twitter</a>
                        <a href="javascript:void(0)" data-href="https://plus.google.com/share?url=http://teothemes.com/html/Aruna" class='googleplus has-tooltip' data-title="Share on Google +">googleplus</a>
                        <a href="mailto:?subject=Check out the best image/meme sharing template!&amp;body=Hey there! Check out the best image/meme sharing template! http://teothemes.com/html/Aruna" class='mail has-tooltip' data-title="Share via Email">mail</a>
                    </div>
                </div>
            </div>
            <div class="article-content">
                <figure>
                    <div class="corner-tag green"><a href="category.html">Gingerfun</a></div>
                    <img class="lazy" data-original="{{$poster->image}}" alt=""/>
                </figure>
            </div>
        </article>
            @endif
    @endforeach

{{--<article class="main-post">--}}
    {{--<div class="article-top">--}}
        {{--<h1><a href="post.html">What to do when you see a perfectly made bed.!</a></h1>--}}
        {{--<hr />--}}
        {{--<div class="counters-line">--}}
            {{--<div class="pull-left">--}}
                {{--<div class="date"><i class="icon-date"></i> 23.04</div>--}}
                {{--<div class="user"><i class="icon-user"></i> <a href="profile.html">helloworld</a></div>--}}
                {{--<div class="comments"><i class="icon-comments"></i> <a href="post.html">63</a></div>--}}
            {{--</div>--}}
            {{--<div class="pull-right">--}}
                {{--<div class="like"><a href="#"><i class="icon-like"></i> 21</a></div>--}}
                {{--<div class="dislike"><a href="#"><i class="icon-dislike"></i> 4012</a></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="buttons-bar">--}}
            {{--<div class="buttons">--}}
                {{--<a href="#" class='repost has-tooltip' data-title="REPOST">Repost</a>--}}
                {{--<a href="#" class='bookmark has-tooltip' data-title="BOOKMARK">bookmark</a>--}}
                {{--<div class="count">2430</div>--}}
            {{--</div>--}}
            {{--<div class="social-icons">--}}
                {{--<a href="javascript:void(0)" data-href="https://www.facebook.com/sharer/sharer.php?u=http://teothemes.com/html/Aruna" class='facebook has-tooltip' data-title="Share on Facebook">facebook</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://twitter.com/intent/tweet?source=tweetbutton&amp;text=Check the best image/meme sharing website!&url=http://teothemes.com/html/Aruna" class='twitter has-tooltip' data-title="Share on Twitter">twitter</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://plus.google.com/share?url=http://teothemes.com/html/Aruna" class='googleplus has-tooltip' data-title="Share on Google +">googleplus</a>--}}
                {{--<a href="mailto:?subject=Check out the best image/meme sharing template!&amp;body=Hey there! Check out the best image/meme sharing template! http://teothemes.com/html/Aruna" class='mail has-tooltip' data-title="Share via Email">mail</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="article-content">--}}
        {{--<figure>--}}
            {{--<div class="corner-tag blue"><a href="category.html">Cute Kittens</a></div>--}}
            {{--<img class="lazy" data-original="img/aEwP539_460sa-1.gif" alt=""/>--}}
        {{--</figure>--}}
    {{--</div>--}}
{{--</article>--}}
{{--<article class="main-post">--}}
    {{--<div class="article-top">--}}
        {{--<h1><a href="post.html">A five-year old that will make you feel stupid.</a></h1>--}}
        {{--<hr />--}}
        {{--<div class="counters-line">--}}
            {{--<div class="pull-left">--}}
                {{--<div class="date"><i class="icon-date"></i> 23.04</div>--}}
                {{--<div class="user"><i class="icon-user"></i> <a href="profile.html">helloworld</a></div>--}}
                {{--<div class="comments"><i class="icon-comments"></i> <a href="post.html">63</a></div>--}}
            {{--</div>--}}
            {{--<div class="pull-right">--}}
                {{--<div class="like"><a href="#"><i class="icon-like"></i> 21</a></div>--}}
                {{--<div class="dislike"><a href="#"><i class="icon-dislike"></i> 4012</a></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="buttons-bar">--}}
            {{--<div class="buttons">--}}
                {{--<a href="#" class='repost has-tooltip' data-title="REPOST">Repost</a>--}}
                {{--<a href="#" class='bookmark has-tooltip' data-title="BOOKMARK">bookmark</a>--}}
                {{--<div class="count">2430</div>--}}
            {{--</div>--}}
            {{--<div class="social-icons">--}}
                {{--<a href="javascript:void(0)" data-href="https://www.facebook.com/sharer/sharer.php?u=http://teothemes.com/html/Aruna" class='facebook has-tooltip' data-title="Share on Facebook">facebook</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://twitter.com/intent/tweet?source=tweetbutton&amp;text=Check the best image/meme sharing website!&url=http://teothemes.com/html/Aruna" class='twitter has-tooltip' data-title="Share on Twitter">twitter</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://plus.google.com/share?url=http://teothemes.com/html/Aruna" class='googleplus has-tooltip' data-title="Share on Google +">googleplus</a>--}}
                {{--<a href="mailto:?subject=Check out the best image/meme sharing template!&amp;body=Hey there! Check out the best image/meme sharing template! http://teothemes.com/html/Aruna" class='mail has-tooltip' data-title="Share via Email">mail</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="article-content">--}}
        {{--<figure>--}}
            {{--<div class="corner-tag yellow"><a href="category.html">Lolcats</a></div>--}}
            {{--<div class="video-wrap">--}}
                {{--<iframe width="560" height="315" src="//www.youtube.com/embed/XFxjy7f9RpY" frameborder="0" allowfullscreen></iframe>--}}
            {{--</div>--}}
        {{--</figure>--}}
    {{--</div>--}}
{{--</article>--}}
{{--<article class="main-post">--}}
    {{--<div class="article-top">--}}
        {{--<h1><a href="post.html">That’s what they say, indeed!</a></h1>--}}
        {{--<hr />--}}
        {{--<div class="counters-line">--}}
            {{--<div class="pull-left">--}}
                {{--<div class="date"><i class="icon-date"></i> 22.04</div>--}}
                {{--<div class="user"><i class="icon-user"></i> <a href="profile.html">helloworld</a></div>--}}
                {{--<div class="comments"><i class="icon-comments"></i> <a href="post.html">1098</a></div>--}}
            {{--</div>--}}
            {{--<div class="pull-right">--}}
                {{--<div class="like"><a href="#"><i class="icon-like"></i> 43</a></div>--}}
                {{--<div class="dislike"><a href="#"><i class="icon-dislike"></i> 7435</a></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="buttons-bar">--}}
            {{--<div class="buttons">--}}
                {{--<a href="#" class='repost has-tooltip' data-title="REPOST">Repost</a>--}}
                {{--<a href="#" class='bookmark has-tooltip' data-title="BOOKMARK">bookmark</a>--}}
                {{--<div class="count">2430</div>--}}
            {{--</div>--}}
            {{--<div class="social-icons">--}}
                {{--<a href="javascript:void(0)" data-href="https://www.facebook.com/sharer/sharer.php?u=http://teothemes.com/html/Aruna" class='facebook has-tooltip' data-title="Share on Facebook">facebook</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://twitter.com/intent/tweet?source=tweetbutton&amp;text=Check the best image/meme sharing website!&url=http://teothemes.com/html/Aruna" class='twitter has-tooltip' data-title="Share on Twitter">twitter</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://plus.google.com/share?url=http://teothemes.com/html/Aruna" class='googleplus has-tooltip' data-title="Share on Google +">googleplus</a>--}}
                {{--<a href="mailto:?subject=Check out the best image/meme sharing template!&amp;body=Hey there! Check out the best image/meme sharing template! http://teothemes.com/html/Aruna" class='mail has-tooltip' data-title="Share via Email">mail</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="article-content">--}}
        {{--<div class="quote-wrap">--}}
            {{--<h2>Quotes</h2>--}}
            {{--<div class="quote">--}}
                {{--<p>&ldquo; They say hard takes one day, they also say impossible takes one week. &rdquo;</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</article>--}}
{{--<article class="main-post">--}}
    {{--<div class="article-top">--}}
        {{--<h1><a href="post.html">That’s what they say, indeed!</a></h1>--}}
        {{--<hr />--}}
        {{--<div class="counters-line">--}}
            {{--<div class="pull-left">--}}
                {{--<div class="date"><i class="icon-date"></i> 22.04</div>--}}
                {{--<div class="user"><i class="icon-user"></i> <a href="profile.html">helloworld</a></div>--}}
                {{--<div class="comments"><i class="icon-comments"></i> <a href="post.html">1098</a></div>--}}
            {{--</div>--}}
            {{--<div class="pull-right">--}}
                {{--<div class="like"><a href="#"><i class="icon-like"></i> 43</a></div>--}}
                {{--<div class="dislike"><a href="#"><i class="icon-dislike"></i> 7435</a></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="buttons-bar">--}}
            {{--<div class="buttons">--}}
                {{--<a href="#" class='repost has-tooltip' data-title="REPOST">Repost</a>--}}
                {{--<a href="#" class='bookmark has-tooltip' data-title="BOOKMARK">bookmark</a>--}}
                {{--<div class="count">2430</div>--}}
            {{--</div>--}}
            {{--<div class="social-icons">--}}
                {{--<a href="javascript:void(0)" data-href="https://www.facebook.com/sharer/sharer.php?u=http://teothemes.com/html/Aruna" class='facebook has-tooltip' data-title="Share on Facebook">facebook</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://twitter.com/intent/tweet?source=tweetbutton&amp;text=Check the best image/meme sharing website!&url=http://teothemes.com/html/Aruna" class='twitter has-tooltip' data-title="Share on Twitter">twitter</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://plus.google.com/share?url=http://teothemes.com/html/Aruna" class='googleplus has-tooltip' data-title="Share on Google +">googleplus</a>--}}
                {{--<a href="mailto:?subject=Check out the best image/meme sharing template!&amp;body=Hey there! Check out the best image/meme sharing template! http://teothemes.com/html/Aruna" class='mail has-tooltip' data-title="Share via Email">mail</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="article-content">--}}
        {{--<div class="quote-wrap">--}}
            {{--<h2>Quotes</h2>--}}
            {{--<div class="quote">--}}
                {{--<p>&ldquo; They say hard takes one day, they also say impossible takes one week. &rdquo;</p>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<figure>--}}
            {{--<img class="lazy" data-original="img/blog-post02.jpg" alt=""/>--}}
        {{--</figure>--}}
    {{--</div>--}}
{{--</article>--}}
{{--<article class="main-post">--}}
    {{--<div class="article-top">--}}
        {{--<h1><a href="post.html">Slidery Slided Slide, captain!</a></h1>--}}
        {{--<hr />--}}
        {{--<div class="counters-line">--}}
            {{--<div class="pull-left">--}}
                {{--<div class="date"><i class="icon-date"></i> 22.04</div>--}}
                {{--<div class="user"><i class="icon-user"></i> <a href="profile.html">helloworld</a></div>--}}
                {{--<div class="comments"><i class="icon-comments"></i> <a href="post.html">1098</a></div>--}}
            {{--</div>--}}
            {{--<div class="pull-right">--}}
                {{--<div class="like"><a href="#"><i class="icon-like"></i> 43</a></div>--}}
                {{--<div class="dislike"><a href="#"><i class="icon-dislike"></i> 7435</a></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="buttons-bar">--}}
            {{--<div class="buttons">--}}
                {{--<a href="#" class='repost has-tooltip' data-title="REPOST">Repost</a>--}}
                {{--<a href="#" class='bookmark has-tooltip' data-title="BOOKMARK">bookmark</a>--}}
                {{--<div class="count">2430</div>--}}
            {{--</div>--}}
            {{--<div class="social-icons">--}}
                {{--<a href="javascript:void(0)" data-href="https://www.facebook.com/sharer/sharer.php?u=http://teothemes.com/html/Aruna" class='facebook has-tooltip' data-title="Share on Facebook">facebook</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://twitter.com/intent/tweet?source=tweetbutton&amp;text=Check the best image/meme sharing website!&url=http://teothemes.com/html/Aruna" class='twitter has-tooltip' data-title="Share on Twitter">twitter</a>--}}
                {{--<a href="javascript:void(0)" data-href="https://plus.google.com/share?url=http://teothemes.com/html/Aruna" class='googleplus has-tooltip' data-title="Share on Google +">googleplus</a>--}}
                {{--<a href="mailto:?subject=Check out the best image/meme sharing template!&amp;body=Hey there! Check out the best image/meme sharing template! http://teothemes.com/html/Aruna" class='mail has-tooltip' data-title="Share via Email">mail</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="article-content">--}}
        {{--<div class="slider-controls-wrap">--}}
            {{--<h2>Quotes</h2>--}}
            {{--<h1 rel="1" class="visible-title">Part 1: The Chronicles</h1>--}}
            {{--<h1 rel="2">Part 2: The Chronicles</h1>--}}
            {{--<h1 rel="3">Part 3: The Chronicles</h1>--}}
            {{--<h1 rel="4">Part 4: The Chronicles</h1>--}}
            {{--<div class="controls">--}}
                {{--<a href="#" class="prev">Prev</a>--}}
                {{--<div class="counters"> <span class="current">4</span> of <span class="total">5</span> </div>--}}
                {{--<a href="#" class="next">Next</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<figure>--}}
            {{--<div class="post-slider flexslider">--}}
                {{--<ul class="slides">--}}
                    {{--<li><img class="lazy" data-original="img/greg.png" alt=""/></li>--}}
                    {{--<li><img src="img/best_theme.png" alt=""/></li>--}}
                    {{--<li><img src="img/greg.png" alt=""/></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</figure>--}}
    {{--</div>--}}
{{--</article>--}}

@endsection
