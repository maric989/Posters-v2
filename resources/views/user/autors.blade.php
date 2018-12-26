@extends('welcome')

@section('content')

<h2 style="text-align: center; font-family: Dosis, Arial, sans-serif">Top Autors</h2>
    <hr>
        @foreach($sorted_autors as $autor)
            <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <img src="{{$autor->profile_photo}}" class="img-responsive" style="margin-bottom: 25px;">
                    </div>
                    <div class="col-12 col-md-7">
                        <table class="table table-striped">
                            <tr>
                                <td>Ime</td>
                                <td>{{$autor->name}}</td>
                            </tr>
                            <tr>
                                <td>Clan od</td>
                                <td>{{$autor->created_at->format('d-m-Y')}}</td>
                            </tr>
                            <tr>
                                <td>Ukupno postera</td>
                                <td>{{$autor->posters->count()}}</td>
                            </tr>
                            <tr>
                                <td>Ukupno definicija</td>
                                <td>{{$autor->definitions->count()}}</td>
                            </tr>
                            <tr>
                                <td>Ukupno Lajkova</td>
                                <td>{{\App\Http\Controllers\AutorsController::countLikesDiff($autor->id)}}</td>
                            </tr>
                        </table>


                    </div>
                </div>
            </div>
            </div>
        @endforeach
@endsection