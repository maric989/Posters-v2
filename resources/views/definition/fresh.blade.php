@extends('welcome')

@section('content')
    @foreach($definitions as $definition)
        @if(($definition->likes->pluck('up')->sum()) <= 2)
            <article class="main-post">
                <div class="article-top">
                    <h1><a href="{{route('single.definition',[$definition->slug,$definition->id])}}">{{$definition->title}}</a></h1>
                    <hr />
                    <div class="counters-line">
                        <div class="pull-left">
                            <div class="date"><i class="icon-date"></i> {{$definition->created_at->diffForHumans()}}</div>
                            <div class="user"><i class="icon-user"></i> <a href="{{route('user.profile',$definition->user->slug)}}">{{$definition->user->name}}</a></div>
                            <div class="comments"><i class="icon-comments"></i> <a href="{{route('user.profile',$definition->user->slug)}}">{{$comments->where('post_id',$definition->id)->where('comm_type','App\Definition')->count()}}</a></div>
                        </div>
                        <div class="pull-right">
                            <div class="like"><a href="#"><i class="icon-like"></i> 43</a></div>
                            <div class="dislike"><a href="#"><i class="icon-dislike"></i> 7435</a></div>
                        </div>
                    </div>
                    <div class="buttons-bar">
                        <div class="buttons">
                            <a href="#" class='repost has-tooltip' data-title="REPOST">Repost</a>
                            <a href="#" class='bookmark has-tooltip' data-title="BOOKMARK">bookmark</a>
                            <div class="count">{{$definition->likes->pluck('up')->sum() - $definition->likes->pluck('down')->sum()}}</div>
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
                    <div class="quote-wrap">
                        <h2>Mudrost</h2>
                        <div class="quote">
                            <p>&ldquo; {{$definition->body}} &rdquo;</p>
                        </div>
                    </div>
                </div>
            </article>
        @endif
    @endforeach
@endsection