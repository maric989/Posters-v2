<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Aruna</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="#">
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

    @yield('css')

    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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
            <div class="col-sm-10 right-content">
                <div class="row">
                    <div class="col-sm-{{strpos(Route::currentRouteName(),'autori') === false?'9':'12' }}">
                        <div class="main-wrap">
                            @yield('content')
                        </div>
                    </div>
                    {{--@if(strpos(Route::currentRouteName(),'autori') === false)--}}
                    @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register' && Route::currentRouteName() != 'autori.index')
                        @if(isset($topPosters))
                            @include('layouts.index.right_sidebar',['top5' => $topPosters])
                        @endif
                    @endif
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

@yield('javascript')

<script>
        function myFunction(val) {
            var test = val.match(/v\=(.*)\&/)[1];
            console.log(test);

            $('#video_iframe').attr('src',val);
        }
</script>

<script>
    $(document).ready(function () {
        $('.dislike').on('click',function () {
            var poster_id = $(this).parent().children('.poster_id').val();
            var score = $('#count_'+poster_id).html();
            var post = $('#like_down_'+poster_id);

            $.ajax({
                type:'POST',
                url:"{{ url('/poster/downvote') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "poster_id": poster_id
                },
                success:function(data){
                    console.log(data)
                    var id = data.poster_id;
                    $('#like_down_'+id).css('background-color', 'blue');
                    $('#count_'+id).text(parseInt(score)-1);
                    $('#like_up_'+id).fadeOut('slow', function(){});
                    $('#like_down_'+id).fadeOut( "slow", function(){});
                }
            });
        });
        $('.like').on('click',function (e) {
            var poster_id = $(this).parent().children('.poster_id').val();
            var score = $('#count_'+poster_id).html();
            var post = $('#like_up_'+poster_id);
            // console.log(post);
            $.ajax({
                type:'POST',
                url:"{{ url('/poster/upvote') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "poster_id": poster_id
                },
                success:function(data){
                    console.log(data)
                    var id = data.poster_id;
                    $('#like_up_'+id).css('background-color', 'blue');
                    $('#count_'+id).text(parseInt(score)+1);
                    $('#like_up_'+id).fadeOut('slow', function(){});
                    $('#like_down_'+id).fadeOut( "slow", function(){});
                }
            });

            // $( ".pull-right" ).fadeOut( "slow", function() {
            //
            // });
        });

        $('#like_down').on('click',function () {
            $( ".pull-right" ).fadeOut( "slow", function() {
                var poster_id = $('#poster_id').val();
                var score = $('.count').html();

                $.ajax({
                    type:'POST',
                    url:"{{ url('/poster/downvote') }}",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        "poster_id": poster_id
                    },
                    success:function(data){
                        $('#like_up').off('click');
                        $('#like_up').css('background-color', 'blue');
                        $('.count').text(parseInt(score)-1);
                    }
                });

            });
        });
        // Material Select Initialization
        $('.mdb-select').materialSelect();

        // $('#prijavi_se').modal('show');
    })
</script>
<script>
    // Get the modal
    var modal = document.getElementById('prijaviSeModal');

    // Get the button that opens the modal
    var btn = document.getElementById("prijaviSeButton");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>

</body>
</html>
