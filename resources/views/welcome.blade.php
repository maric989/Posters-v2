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
                        <div class="col-sm-7 border-right">
                            <div class="input-group">
                                <span class="input-group-addon">Email:</span>
                                <input type="text" class="form-control" value="teothemes@gmail.com">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">Username:</span>
                                <input type="text" class="form-control" value="loginteothemes">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">Password:</span>
                                <input type="password" class="form-control" value="password">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">Repeat Password:</span>
                                <input type="password" class="form-control" value="password">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="vertical-half">
                                <div class="custom-checkbox">
                                    <input type="checkbox" value="check1" name="check" id="check1" checked />
                                    <label for="check1">GAGS OF THE WEEK</label>
                                </div>
                                <div class="custom-checkbox">
                                    <input type="checkbox" value="check1" name="check" id="check2" />
                                    <label for="check2">NEWSLETTER</label>
                                </div>
                            </div>
                            <div class="vertical-half">
                                <div class="custom-checkbox-vertical custom-checkbox">
                                    <p>I promise only to have fun here and I fully agree with the</p>
                                    <input type="checkbox" value="check1" name="check" id="agreeTerms" />
                                    <label for="agreeTerms">Terms of Agreement.</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input id="register-button" type="submit" value="NICE, REGISTER ME!" class="btn btn-primary btn-block custom-button" />
                        <a id="error-button" class="btn btn-block btn-info custom-button" href="#">WHY DON’T YOU AGREE WITH OUR ToA?</a>
                    </div>
                </div>
                <div class="modal-window login-window">
                    <div class="half-horizontal">
                        <div class="input-group">
                            <span class="input-group-addon">Username:</span>
                            <input type="text" class="form-control" value="loginteothemes">
                        </div>
                    </div>
                    <div class="half-horizontal">
                        <div class="input-group">
                            <span class="input-group-addon">Password:</span>
                            <input type="password" class="form-control" value="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-block btn-info custom-button" href="#">CAN'T LOGIN YET</a>
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
</body>
</html>