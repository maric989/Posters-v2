<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Aruna</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="favicon.png">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{asset('aruna/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('aruna/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('aruna/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('aruna/css/jquery.selectBoxIt.css')}}">
    <link rel="stylesheet" href="{{asset('aruna/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('aruna/fileupload/css/jquery.fileupload.css')}}">
    <link rel="stylesheet" href="{{asset('aruna/fileupload/css/jquery.fileupload-ui.css')}}">
    <link rel="stylesheet" href="{{asset('aruna/css/jquery.tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('aruna/css/style.css')}}">

    <script src="{{asset('aruna/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=225987124123858";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('layouts.index.header_index')
            </div>
        </div>
    </div>
</header>
<section id="main" role="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 right-content">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="main-wrap">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.index.right_sidebar')
                </div>
            </div>
            @include('layouts.index.left_sidebar')
        </div>
    </div>
</section>
@include('layouts.index.footer')
<a href="#" class="scroll-top">&nbsp;</a>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-top-menu">
                    <div class="half">
                        <button class="btn btn-link btn-block active-ind" rel="register-window">Register new account</button>
                    </div>
                    <div class="half">
                        <button class="btn btn-link btn-block" rel="login-window">Login</button>
                    </div>
                </div>
                <div class="modal-window register-window">
                    <div class="row">
                        @include('layouts.index.registration')
                    </div>
                <div class="modal-window login-window">
                    @include('layouts.index.login')
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@include('layouts.index.add_post')
<div id="scripts">
    <script src="{{asset('aruna/js/vendor/jquery-1.10.1.min.js')}}"></script>
    <script src="{{asset('aruna/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('aruna/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('aruna/js/vendor/jquery.flexslider-min.js')}}"></script>
    <script src="{{asset('aruna/js/vendor/jquery.selectBoxIt.min.js')}}"></script>
    <script src="{{asset('aruna/js/vendor/jquery.mCustomScrollbar.min.js')}}"></script>
    <script src="{{asset('aruna/js/vendor/jquery.mousewheel.min.js')}}"></script>
    <script src="{{asset('aruna/fileupload/js/vendor/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('aruna/js/vendor/jquery.tagsinput.min.js')}}"></script>
    <script src="{{asset('aruna/fileupload/js/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('aruna/fileupload/js/jquery.fileupload.js')}}"></script>
    <script src="{{asset('aruna/fileupload/js/jquery.fileupload-process.js')}}"></script>
    <script src="{{asset('aruna/fileupload/js/jquery.fileupload-image.js')}}"></script>
    <script src="{{asset('aruna/fileupload/js/jquery.fileupload-audio.js')}}"></script>
    <script src="{{asset('aruna/fileupload/js/jquery.fileupload-video.js')}}"></script>
    <script src="{{asset('aruna/fileupload/js/jquery.fileupload-validate.js')}}"></script>
    <script src="{{asset('aruna/js/main.js')}}"></script>
    <script src="{{asset('aruna/js/retina-1.1.0.min.js')}}"></script>
    <script src="{{asset('aruna/js/jquery.lazyload.min.js')}}"></script>
</div>

<script>
        function myFunction(val) {
            var test = val.match(/v\=(.*)\&/)[1];
            console.log(test);

            $('#video_iframe').attr('src',val);
        }
</script>
<script>
    $(document).ready(function () {
        var poster_id = $('#poster_id').val();

        $('#upvote_poster').on('click',function (event) {
            event.preventDefault();
            console.log('like1');

            $.ajax({
                type:'POST',
                url:"{{ url('/poster/upvote') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "poster_id": poster_id
                },
                success:function(data){
                    $('#countDown').html(data.down);
                    $('#countUp').html(data.up);
                }
            });
        });

        $('#downvote_poster').on('click',function (event) {
            event.preventDefault();
            console.log('like1');

            $.ajax({
                type:'POST',
                url:"{{ url('/poster/downvote') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "poster_id": poster_id
                },
                success:function(data){
                    $('#countDown').html(data.down);
                    $('#countUp').html(data.up);
                }
            });
        });
    })
</script>
</body>
</html>