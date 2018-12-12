@extends('welcome')

@section('content')

    <div class="main-wrap">
        <article class="main-post post-page">
            <div class="article-top">
                <h1><a href="#">{{$definition->title}}</a></h1>
                <hr/>
                <div class="counters-line">
                    <div class="pull-left">
                        <div class="date"><i class="icon-date"></i>{{$definition->created_at}}</div>
                        <div class="user"><i class="icon-user"></i> <a href="profile.html">{{$definition->user->name}}</a></div>
                        <div class="comments"><i class="icon-comments"></i> <a href="#">{{$comments->count()}}</a></div>
                    </div>
                    @if(Auth::user())
                        <div class="pull-right">
                            <div class="like">
                                <input type="hidden" value="{{$definition->id}}" id="poster_id">
                                <a href="#"><i class="icon-like" id="upvote_poster"></i><span id="countUp">{{$likesUp->count()}}</span></a>

                            </div>
                            <div class="dislike">
                                <a href="#"><i class="icon-dislike" id="downvote_poster"></i><span id="countDown">{{$likesDown->count()}}</span></a>
                            </div>
                        </div>
                    @else
                        <div class="pull-right">
                            <div class="like">
                                <input type="hidden" value="{{$definition->id}}" id="poster_id">
                                <a href="{{route('login')}}"><i class="icon-like"></i><span id="countUp">{{$likesUp->count()}}</span></a>

                            </div>
                            <div class="dislike">
                                <a href="{{route('login')}}"><i class="icon-dislike"></i><span id="countDown">{{$likesDown->count()}}</span></a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="buttons-bar">
                    <div class="buttons">
                        <a href="#" class='repost has-tooltip' data-title="REPOST">Repost</a>
                        <a href="#" class='bookmark has-tooltip' data-title="BOOKMARK">bookmark</a>
                        <div class="count"><span id="likesSum">{{$likesSum}}</span></div>
                    </div>
                    <div class="social-icons">
                        <a href="javascript:void(0)"
                           data-href="https://www.facebook.com/sharer/sharer.php?u=http://teothemes.com/html/Aruna"
                           class='facebook has-tooltip' data-title="Share on Facebook">facebook</a>
                        <a href="javascript:void(0)"
                           data-href="https://twitter.com/intent/tweet?source=tweetbutton&amp;text=Check the best image/meme sharing website!&url=http://teothemes.com/html/Aruna"
                           class='twitter has-tooltip' data-title="Share on Twitter">twitter</a>
                        <a href="javascript:void(0)"
                           data-href="https://plus.google.com/share?url=http://teothemes.com/html/Aruna"
                           class='googleplus has-tooltip' data-title="Share on Google +">googleplus</a>
                        <a href="mailto:?subject=Check out the best image/meme sharing template!&amp;body=Hey there! Check out the best image/meme sharing template! http://teothemes.com/html/Aruna"
                           class='mail has-tooltip' data-title="Share via Email">mail</a>
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
        <div class="article-infos">
            @if($tagged)
                <h2>Post tags</h2>
                <hr/>
                <div class="tags">
                    <ul>
                        @foreach($tagged as $tag)
                            <li><a href="#">{{$tag->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="comments-counter">
                <button class="btn btn-primary custom-button pull-right">Komentari</button>
                <div class="text">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#normalComments">{{$comments->count()}} Komentar</a></li>
                        <li><a href="#facebookComments">Facebook comments</a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="normalComments">
                    <div class="comments-wrap">
                        <ul>
                            <li>
                                @foreach($comments as $comment)
                                    <div class="comment">
                                        <figure>
                                            <img src="{{asset('aruna/img/comment-user01.png')}}" alt=""/>
                                        </figure>
                                        <div class="comment-text">
                                            {{--<span class="counter">01</span>--}}

                                            <h3><a href="#">{{$comment->user->name}}</a></h3>
                                            <div class="like-box">
                                                <div class="like"><a href="#"><i class="icon-like"></i> 56</a></div>
                                                <div class="dislike"><a href="#"><i class="icon-dislike"></i> 32</a></div>
                                            </div>
                                            <hr/>
                                            <div class="message">
                                                <p>
                                                    {{$comment->body}}
                                                </p>
                                            </div>
                                            {{--<div class="controls-box">--}}
                                            {{--<a href="#" class="button"><i class="icon-quote"></i></a>--}}
                                            {{--<a href="#" class="button"><i class="icon-replay"></i></a>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <h2>Dodaj komentar</h2>
                    <hr/>
                    @if(Auth::user())
                        <form method="POST" action="{{route('add_comment')}}">
                            {{csrf_field()}}
                            <div class="comments-form">
                                <textarea class="form-control" rows="10" name="body"></textarea>
                                <input type="hidden" value="{{$definition->id}}" name="poster_id">
                                <input type="hidden" value="App\Definition" name="type">
                                <button type="submit"  class="btn btn-primary btn-lg custom-button">Dodaj komentar</button>
                            </div>
                        </form>
                    @else
                        <textarea class="form-control" rows="10" name="body"> Morate biti prijavljeni da bi ostavili komentar
                        </textarea>
                        <a href="{{route('login')}}" type="submit"  class="btn btn-primary btn-lg custom-button">Login</a>
                        <a href="{{route('register')}}" type="submit"  class="btn btn-primary btn-lg custom-button">Register</a>

                    @endif
                </div>
                <div class="tab-pane" id="facebookComments">
                    <div class="fb-comments" data-href="http://example.com/comments" data-colorscheme="light"
                         data-numposts="5" data-width="400px"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
