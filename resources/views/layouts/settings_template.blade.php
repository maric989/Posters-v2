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
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <script src="{{asset('aruna/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
    <style>
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #7f46dd;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            /*border: 1px solid #ccc;*/
            border-top: none;
        }
    </style>
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
            <div class="col-sm-12 right-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-wrap">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            {{--@include('layouts.index.left_sidebar')--}}
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

</script>
<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
</body>
</html>
