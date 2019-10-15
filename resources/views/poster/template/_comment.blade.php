<div class="comment-text">
    {{--<span class="counter">01</span>--}}
    <div class="col-md-12 comment-user-info" style="height: 23px" >
        <div class="col-md-6 comment-creator-name">
            <a href="{{route('user.profile',[$comment->user->slug])}}">{{ucfirst($comment->user->name)}}</a>
        </div>
        <div class="col-md-6 comment-likes" id="comment-{{$comment->id}}">
            @if(!Auth::user())
            <span class="like-plus">&#43;</span>{{$comment->CommentLikes}}
            <span> : </span>
            {{$comment->CommentDislikes}} <span class="like-minus">&#8722;</span>
            @else
               @if ($comment->isUserLikedOrDisliked(Auth::user()->id))
                    <img src="{{url('/images/cube.png')}}" style="width: 10%; margin-top: -20px"> <span style="font-size: 35px">{{$comment->CommentLikes - $comment->CommentDislikes}}</span>
               @else
                    <a class="like-plus logged-like" data-id="{{$comment->id}}">&#43;</a>{{$comment->CommentLikes}}
                    <span> : </span>
                    {{$comment->CommentDislikes}} <a class="like-minus logged-dislike" data-id="{{$comment->id}}">&#8722;</a>
               @endif
            @endif
        </div>
{{--        <div class="col-md-6 user-liked">--}}
{{--            <p> Hvala sto ste glasali </p>--}}
{{--        </div>--}}
    </div>
    <div class="message">
        <p>
            {{$comment->body}}
        </p>
    </div>
</div>
