@extends('layouts.settings_template')

@section('content')
    <section id="main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 right-content profile-bg">
                    <div class="row">
                        <div class="profile-wrap" style="background-image: url('{{asset('aruna/img/settings-cover.jpg')}}');">
                            <div class="col-sm-9">
                                <div class="outer">
                                    <div class="inner">
                                        <figure>
                                            <img src="{{asset('aruna/img/user02.png')}}" alt=""/>
                                        </figure>
                                        <div class="text">
                                            <div class="outer">
                                                <div class="inner">
                                                    <a href="#" class="user-name">{{$user->name}}</a>
                                                    <div class="page-name">Podesavanja</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="outer">
                                    <div class="inner">
                                        <div class="counter-item">
                                            <span class="number">{{$user->countLikesDiff()}}</span><br/>
                                            <span class="exp">Skor</span>
                                        </div>
                                        <div class="counter-item">
{{--                                            <span class="number">{{$poster_number + $definition_number}}</span><br/>--}}
                                            <span class="number">{{$user->getPostersCount() + $user->getDefinitionCount()}}</span><br/>
                                            <span class="exp">Postova</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary custom-button btn-md" data-toggle="modal" data-target="#modalCoverForm" style="margin-top: 5px">Izmeni Pozadinu</button>
                        <button class="btn btn-primary custom-button btn-md" data-toggle="modal" data-target="#modalProfilImgForm" style="margin-top: 5px" >Izmeni profilnu sliku</button>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="main-wrap">
                                <h1>Profil</h1>
                                <div class="separator"></div>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">Email:</span>
                                            <input type="text" class="form-control" value="teothemes@gmail.com">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">Password:</span>
                                            <input type="password" class="form-control" value="password">
                                        </div>
                                        <button class="btn btn-primary custom-button btn-block" type="submit"><i class="glyphicon glyphicon-check"></i> Save Settings</button>
                                        <div class="spacer"></div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">Username:</span>
                                            <input type="text" class="form-control" value="loginteothemes">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">Repeat Password:</span>
                                            <input type="password" class="form-control" value="password">
                                        </div>
                                    </div>
                                </div>
                                <h1>Preferences</h1>
                                <div class="separator"></div>
                                <div class="checkbox-line">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" value="check1" name="check" id="check1" checked />
                                        <label for="check1">ANONYMOUS SURFING (YOU CAN POST)</label>
                                    </div>
                                    <div class="custom-checkbox">
                                        <input type="checkbox" value="check1" name="check" id="check2" />
                                        <label for="check2">ADULT FILTER</label>
                                    </div>
                                    <div class="custom-checkbox">
                                        <input type="checkbox" value="check1" name="check" id="check3" />
                                        <label for="check3" class="has-popover" data-content="When you scroll down, active gifs will become inactive. This is a life saver - trust us!">ACTIVATE .GIFs ON SCROLL</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--Modals--}}
    <div class="modal fade" id="modalCoverForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Dodaj Sliku</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('change.cover')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="file" id="cover_img" class="form-control validate" name="cover_img" required>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default">Izmeni</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalProfilImgForm" tabindex="-1" role="dialog" aria-labelledby="myProfileLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Dodaj Sliku</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('change.profile')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="file" id="profile_img" class="form-control validate" name="profile_img" required>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default">Izmeni</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
