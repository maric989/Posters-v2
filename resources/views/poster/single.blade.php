@extends('welcome')

@section('css')
<style>
    .like-plus{
        font-size: 30px;
        color: green;
        font-weight: bold;
    }
    .like-minus{
        font-size: 30px;
        color: red;
        font-weight: bold;
    }
    .comment-user-info{
        border-bottom: 1px solid blueviolet;
        padding: 0;
    }
    .comment-likes{
        text-align: right;
        margin-top: -20px;
    }
    .comment-creator-name{
        padding-left: 0;
    }
    .message{
        padding: 10px;
    }
    .user-liked{
        text-align: right;
        margin-top: -20px;
        display: none;
    }
</style>
@endsection

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
                        <li class="active"><a href="#normalComments">{{$comments->count()}}  @if($comments->count() == 1)Komentar @else Komentara @endif</a></li>
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
                                        @include('poster.template._comment', ['comment' => $comment])
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
                        <textarea class="form-control" rows="10" name="body" readonly> Morate biti prijavljeni da bi ostavili komentar
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
        //Like comment
        $('.logged-like').on('click',function () {
            var liked_id = $('.logged-like').data('id');
            $.ajax({
                type:'POST',
                url:"{{ url('/comment/upvote') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "comment_id": liked_id
                },
                success:function(data){
                    $('#comment-'+liked_id).replaceWith("<p style=' text-align: right;margin-top: -20px;'> Hvala sto ste glasali </p>");
                }
            });        });
        //Dislike comment
        $('.logged-dislike').on('click',function () {
            var disliked_id = $('.logged-dislike').data('id');
            $.ajax({
                type:'POST',
                url:"{{ url('/comment/downvote') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "comment_id": disliked_id
                },
                success:function(data) {
                    console.log('.comment-'+disliked_id);
                    $('#comment-'+disliked_id).replaceWith("<p style=' text-align: right;margin-top: -20px;'> Hvala sto ste glasali </p>");
                }
            });
        })
    })
</script>
@endsection
