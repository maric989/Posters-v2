{{--<div class="comment-text">--}}
    {{--<span class="counter">01</span>--}}
    {{--<div class="col-md-12 comment-user-info" style="height: 23px" >--}}
        {{--<div class="col-md-6 comment-creator-name">--}}
            {{--<a href="{{route('user.profile',[$comment->user->slug])}}">{{ucfirst($comment->user->name)}}</a>--}}
        {{--</div>--}}
        {{--<div class="col-md-6 comment-likes" id="comment-{{$comment->id}}">--}}
            {{--@if(!Auth::user())--}}
            {{--<span class="like-plus">&#43;</span>{{$comment->commentLikes}}--}}
            {{--<span> : </span>--}}
            {{--{{$comment->commentDislikes}} <span class="like-minus">&#8722;</span>--}}
            {{--@else--}}
               {{--@if ($comment->isUserLikedOrDisliked(Auth::user()->id))--}}
                    {{--<img src="{{url('/images/cube.png')}}" style="width: 10%; margin-top: -20px"> <span style="font-size: 35px">{{$comment->commentLikes - $comment->commentDislikes}}</span>--}}
               {{--@else--}}
                    {{--<a class="like-plus logged-like" data-id="{{$comment->id}}">&#43;</a>{{$comment->commentLikes}}--}}
                    {{--<span> : </span>--}}
                    {{--{{$comment->commentDislikes}} <a class="like-minus logged-dislike" data-id="{{$comment->id}}">&#8722;</a>--}}
               {{--@endif--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="message">--}}
        {{--<p>--}}
            {{--{{$comment->body}}--}}
        {{--</p>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="media-left">
    <img src="{{ $poster->user->profilePhotoLink }}" alt=""/>
</div>

<div class="comment-content">
    <h4>{{$comment->user->name}}</h4>
    <p>{{$comment->body}}</p>
    <div class="comment-likes">
    @if(Auth::user())
        @if ($comment->isUserLikedOrDisliked(Auth::user()->id))
            {{--<img src="{{url('/images/cube.png')}}" style="width: 10%; margin-top: -20px">--}}
                <span style="font-size: 20px">
                    {{$comment->commentLikes - $comment->commentDislikes}}
                </span>
        @else
                <a class="btn btn-default btn-number logged-like" data-type="plus" data-id="{{$comment->id}}" data-field="quant[1]">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
                <span>:</span>
                <a class="btn btn-default btn-number logged-dislike" data-id="{{$comment->id}}" data-type="plus" data-field="quant[1]">
                <span class="glyphicon glyphicon-minus"></span>
                </a>
        @endif
    @endif
    </div>
</div>
