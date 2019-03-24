@extends('welcome')

@section('content')

<h2 style="text-align: center; font-family: Dosis, Arial, sans-serif">Top Autors</h2>
    <hr>
        @foreach($sorted_authors as $author)
            <div class="row">
            <div class="col-12">
                <div class="row">
                    <a href="{{url('user/'.$author->slug)}}">
                        <div class="col-12 col-md-5">
                            <img src="{{(empty($author->profile_photo)? env('DEFAULT_PROFILE_IMG_LINK') : $author->profile_photo)}}" class="img-responsive" style="margin-bottom: 25px;">
                        </div>
                    </a>
                    <div class="col-12 col-md-7">
                        <table class="table table-striped">
                            <tr>
                                <td>Ime</td>
                                <td>{{$author->name}}</td>
                            </tr>
                            <tr>
                                <td>Clan od</td>
                                <td>{{$author->created_at->format('d-m-Y')}}</td>
                            </tr>
                            <tr>
                                <td>Ukupno postera</td>
                                <td>{{$author->posters->count()}}</td>
                            </tr>
                            <tr>
                                <td>Ukupno definicija</td>
                                <td>{{$author->definitions->count()}}</td>
                            </tr>
                            <tr>
                                <td>Ukupno Lajkova</td>
                                <td>{{$author->countLikesDiff($author->id)}}</td>
                            </tr>
                        </table>


                    </div>
                </div>
            </div>
            </div>
        @endforeach
@endsection
