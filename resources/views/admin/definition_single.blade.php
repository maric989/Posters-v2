@extends('admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('admin_single_definition',$definition->id)}}">
                    <h3>{{$definition->title}}</h3>
                    <hr>
                    @include('layouts.flash_message')
                </a>
                <div class="article-content">
                    <div class="quote-wrap">
                        <div style="word-wrap: break-word;">
                            <h3>{{$definition->body}}</h3>
                        </div>
                    </div>
                </div>                <br>
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
                                            <td>{{$definition->user->name}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><strong>Approved</strong></td>
                                            <td style="background-color: {{($definition->approved)?'Green' : 'Red'}}; color: white">{{($definition->approved)?'Yes' : 'Not Approved'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Created At</strong></td>
                                            <td>{{$definition->created_at->format('d-m-Y')}}</td>
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
                                            @if($definition->approved)
                                                <form action="{{route('definition.refuse',$definition->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <td><button class="btn btn-warning">Refuse</button></td>
                                                </form>
                                            @else
                                                <form action="{{route('definition.approve',$definition->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <td><button class="btn btn-success">Approve</button></td>
                                                </form>
                                            @endif
                                            <form action="{{route('definition.delete',$definition->id)}}" method="post">
                                                {{csrf_field()}}
                                                <td><button class="btn btn-danger">Delete</button></td>
                                            </form>
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