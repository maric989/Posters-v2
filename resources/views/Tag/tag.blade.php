@extends('welcome')

@section('content')

    <h3>Tag <span style="color: red">{{$tag->name}}</span></h3>
    @foreach($posters as $poster)
        <article class="main-post">
            <div class="article-top">
                <h1><a href="{{route('single.poster',[$poster->slug,$poster->id])}}">{{$poster->title}}</a></h1>
                <hr />
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i> {{$poster->created_at->diffForHumans()}}</div>
                        <div class="user"><i class="icon-user"></i> <a href="{{route('user.profile',$poster->user->slug)}}">{{$poster->user->name}}</a></div>
                        {{--<div class="comments"><i class="icon-comments"></i> <a href="{{route('single.poster',[$poster->slug,$poster->id])}}">{{$comments->where('post_id',$poster->id)->where('comm_type','App\Poster')->count()}}</a></div>--}}
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

    @endforeach
@endsection