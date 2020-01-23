<article class="main-post">
    <div class="article-top">
        <h1><a href="{{route('single.poster',[$poster->slug,$poster->id])}}">{{$poster->title}}</a></h1>
        <hr />
        <div class="counters-line">
            <div class="pull-left">
                {{--<div class="date"><i class="icon-date"></i> {{$poster->created_at->diffForHumans()}}</div>--}}
                <div class="user">
                    <img src="{{$poster->user->profilePhotoLink}}" class="user-poster-profile" style="width: 30px;height: 30px">
                    <a href="{{route('user.profile',$poster->user->slug)}}">{{$poster->user->name}}</a>
                </div>
                <div class="comments"><i class="icon-comments"></i> <a href="{{route('single.poster',[$poster->slug,$poster->id])}}">{{$poster->countComments()}}</a></div>
            </div>

            @if(Auth::user() && !Auth::user()->isPostLiked($poster->id,Auth::user()->id))
            <div class="pull-right">
                <input type="hidden" value="{{$poster->id}}" class="poster_id">
                <div class="like" id="like_up_{{$poster->id}}" data-value="1">
                    <i class="icon-like upvote_poster"></i><span class="countUp"></span>
                </div>
                <div class="dislike" id="like_down_{{$poster->id}}" data-value="-1">
                    <i class="icon-dislike"></i>
                </div>
            </div>
            @endif
        </div>
        <div class="buttons-bar">
            <div class="buttons">
                {{--<a href="#" class='repost has-tooltip' data-title="REPOST">Repost</a>--}}
                {{--<a href="#" class='bookmarked has-tooltip' data-title="BOOKMARKED">bookmarked</a>--}}
                <div class="date-bar">
                    {{--<i class="icon-calendar" style="height:55px"></i> --}}
                    {{$poster->created_date}}
                </div>

                <div class="count" id="count_{{$poster->id}}">
                    <i class="fas fa-star"></i>
                    {{ (new \App\Models\Poster\PostersSummary())->getRating($poster->id) }}
                </div>

                <div class="author-bar">
                   <p>{{$poster->user->name}}</p>
                </div>


            </div>
            <div class="social-icons">
                <a href="javascript:void(0)" data-href="https://www.facebook.com/sharer/sharer.php?u=http://teothemes.com/html/Aruna" class='facebook has-tooltip' data-title="Share on Facebook">facebook</a>
                <a href="javascript:void(0)" data-href="https://twitter.com/intent/tweet?source=tweetbutton&amp;text=Check the best image/meme sharing website!&url=http://teothemes.com/html/Aruna" class='twitter has-tooltip' data-title="Share on Twitter">twitter</a>
                <a href="javascript:void(0)" data-href="https://plus.google.com/share?url=http://teothemes.com/html/Aruna" class='googleplus has-tooltip' data-title="Share on Google +">googleplus</a>
                {{--<a href="mailto:?subject=Check out the best image/meme sharing template!&amp;body=Hey there! Check out the best image/meme sharing template! http://teothemes.com/html/Aruna" class='mail has-tooltip' data-title="Share via Email">mail</a>--}}
            </div>

        </div>
    </div>
    <div class="article-content">
        <figure>
{{--            <div class="corner-tag green"><a href="category.html">Gingerfun</a></div>--}}
            <img class="lazy" data-original="{{$poster->image}}" alt=""/>
        </figure>
    </div>
</article>


