@extends('welcome')

@section('content')

<h2 style="text-align: center; font-family: Dosis, Arial, sans-serif">Top Autors</h2>
    <hr>
<div class="row">
    <div class="col-lg-12">


        @foreach($sorted_authors as $author)
                <div class="col-lg-6">
                    <div class="col-lg-4 col-md-4" style="float: left">
                    <a href="{{url('user/'.$author->slug)}}">
                            <img src="{{(empty($author->profile_photo)? env('DEFAULT_PROFILE_IMG_LINK') : $author->profile_photo)}}" class="img-responsive" style="margin-bottom: 25px;">

                    </a>
                    </div>
                    <div class="col-8 col-md-8">
                        <table class="table table-striped">
                            <tr>
                                <td>Ime</td>
                                <td>{{$author->name}}</td>
                            </tr>
                            <tr>
                                <td>Clan od</td>
                                <td>{{$author->joinedAt}}</td>
                            </tr>
                            <tr>
                                <td>Ukupno postera</td>
                                <td>{{$author->posters->count()}}</td>
                            </tr>
                            <tr>
                                <td>Ukupno Lajkova</td>
                                <td>{{$author->countLikesDiff($author->id)}}</td>
                            </tr>
                        </table>


                    </div>
                </div>

        @endforeach
    </div>
</div>
@endsection
