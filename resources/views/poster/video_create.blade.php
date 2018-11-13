@extends('welcome')

@section('content')

<form action="{{route('store.poster')}}" method="post" enctype="multipart/form-data" id="video_form">
    <div class="post-window window-video">
        <div class="window-left">
            <textarea class="form-control" rows="3" placeholder="Post title"></textarea>
            <input type="text" onChange="myFunction(this.value)" class="form-control" placeholder="Paste your link here (Youtube, Vimeo)" name="image" id="video_src"/>
            <figure>
                <div class="video-wrap">
                    <iframe width="560" height="315" src="//www.youtube.com/embed/LNrb7ncKc9M" frameborder="0" allowfullscreen id="video_iframe"></iframe>
                </div>
            </figure>
        </div>
        <aside>
            <div class="outer">
                <div class="inner">
                    <div class="custom-checkbox">
                        <input type="checkbox" value="check1" name="check" id="check7" checked />
                        <label for="check7">NSFW</label>
                    </div>
                    {{--<div class="custom-checkbox">--}}
                    {{--<input type="checkbox" value="check1" name="check" id="check8" />--}}
                    {{--<label for="check8">COMMENTS</label>--}}
                    {{--</div>--}}
                    {{--<div class="custom-checkbox">--}}
                    {{--<input type="checkbox" value="check1" name="check" id="check9" />--}}
                    {{--<label for="check9">ANONYMOUS</label>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="tags-wrap">
                <h3>Tags:</h3>
                <input name="tags" class="tags-selector" value="awesome,comic,lolcat" />
            </div>
        </aside>
    </div>
</form>
@endsection

