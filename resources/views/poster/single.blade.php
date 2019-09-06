@extends('welcome')

@section('content')

    <div class="main-wrap">
        @include('poster.template.poster')

        <div class="article-infos">
            @if($tagged)
                <h2>Post tags</h2>
                <hr/>
                <div class="tags">
                    <ul>
                        @foreach($tagged as $tag)
                            <li><a href="{{route('tags',$tag->name)}}">{{$tag->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="comments-counter">
                <button class="btn btn-primary custom-button pull-right">Komentari</button>
                <div class="text">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#normalComments">{{$comments->count()}} Komentar</a></li>
                        {{--<li><a href="#facebookComments">Facebook comments</a></li>--}}
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
                                            <img src="{{(!empty($poster->user->profile_photo))? $poster->user->profile_photo : config('settings.default_profile_image')}}" alt=""/>
                                        </figure>
                                        <div class="comment-text">
                                            {{--<span class="counter">01</span>--}}

                                            <h3><a href="#">{{$comment->user->name}}</a></h3>
                                            @if (!$comment->isUserLikedOrDisliked(Auth::user()->id))
                                                <div class="like-box">
                                                    <div class="like_comment" data-id="{{$comment->id}}"><i class="icon-like"></i> {{$comment->CommentLikes}}</div>
                                                    <div class="dislike_comment" data-id="{{$comment->id}}"><i class="icon-dislike"></i> {{$comment->CommentDislikes}}</div>
                                                </div>
                                            @else
                                                <div class="like-box">
                                                    <div><i class="icon-like"></i> {{$comment->CommentLikes}}</div>
                                                    <div><i class="icon-dislike"></i> {{$comment->CommentDislikes}}</div>
                                                </div>
                                            @endif
                                            <hr/>
                                            <div class="message">
                                                <p>
                                                    {{$comment->body}}
                                                </p>
                                            </div>

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
                                <input type="hidden" value="{{$poster->id}}" name="poster_id">
                                <input type="hidden" value="App\Poster" name="type">
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

@section('javascript')
<script>
    $(document).ready(function () {
        $('.like_comment').on('click',function () {
            var liked_id = $('.like_comment').attr('data-id');
            var score = $('.like_comment').html();
            console.log(score)

            $.ajax({
                type:'POST',
                url:"{{ url('/comment/upvote') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "comment_id": liked_id
                },
                success:function(data){
                    // $('.like-box').css('display','none');
                    $('.like_comment i').text(parseInt(score)-1);

                }
            });
        });

        $('.dislike_comment').on('click',function () {
            var disliked_id = $('.dislike_comment').attr('data-id');
                $.ajax({
                    type:'POST',
                    url:"{{ url('/comment/downvote') }}",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        "comment_id": disliked_id
                    },
                    success:function(data){
                        $('.like-box').css('display','none');
                    }
                });
        });
    })
</script>
@endsection
