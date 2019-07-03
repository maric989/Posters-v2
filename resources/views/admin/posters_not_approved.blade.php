@extends('admin.admin')
@section('content')
    <div class="container">
        <h1 style="text-align: center"> <span style="color: green">Waiting Approval</span> Posters</h1>
        <div class="row">
            <div class="column">
                @foreach($posters as $poster)
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('admin_single_poster',$poster->id)}}">
                            <h3 class="box-title"><strong>{{$poster->title}}</strong></h3>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <td><img src="{{$poster->image}}" width="25%"></td>
                            </tr>
                            <tr>
                                <td><strong>Creator</strong></td>
                                <td>{{$poster->user->name}}
                                </td>

                            </tr>
                            <tr>
                                <td><strong>Created At</strong></td>
                                <td>{{$poster->created_date}}</td>
                            </tr>
                            <tr>
                                <td><strong>Action</strong></td>
                                <form action="{{route('poster.approve',$poster->id)}}" method="post">
                                    {{csrf_field()}}
                                    <td><button class="btn btn-success">Approve</button> </td>
                                </form>
                                <form action="{{route('poster.delete',$poster->id)}}" method="post">
                                    {{csrf_field()}}
                                    <td><button class="btn btn-danger">Delete</button> </td>
                                </form>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                @endforeach

            </div>
        </div>
        <div class="row" style="text-align: center">
            {{$posters->links()}}
        </div>
    </div>
@endsection
