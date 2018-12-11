@extends('admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('admin_single_poster',$poster->id)}}">
                    <h3>{{$poster->title}}</h3>
                    @include('layouts.flash_message')
                </a>
                <img src="{{$poster->image}}" class="img-thumbnail">
                <br>
            </div>
            <div class="col-md-6">
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Poster Info</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td><strong>Creator</strong></td>
                                        <td>{{$poster->user->name}}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><strong>Approved</strong></td>
                                        <td style="background-color: {{($poster->approved)?'Green' : 'Red'}}; color: white">{{($poster->approved)?'Yes' : 'Not Approved'}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created At</strong></td>
                                        <td>{{$poster->created_at->format('d-m-Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Comments number</strong></td>
                                        <td>{{$comments->count()}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Likes</strong></td>
                                        <td>{{$likes->where('up',1)->count()}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Dislikes</strong></td>
                                        <td>{{$likes->where('down',1)->count()}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Impression</strong></td>
                                        <td>{{$likes->where('up',1)->count() - $likes->where('down',1)->count()}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Actions</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <tbody style="text-align: center">
                                        <tr>
                                            <td><button class="btn btn-primary">Edit</button></td>
                                            @if($poster->approved)
                                                <form action="{{route('poster.refuse',$poster->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <td><button class="btn btn-warning">Refuse</button></td>
                                                </form>
                                            @else
                                                <form action="{{route('poster.approve',$poster->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <td><button class="btn btn-success">Approve</button></td>
                                                </form>
                                            @endif
                                            <td><button class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>

            </div>
        </div>
    </div>
@endsection