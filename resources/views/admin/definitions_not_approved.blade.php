@extends('admin.admin')
@section('content')
    <div class="container">
        <h1 style="text-align: center"> <span style="color: green">Waiting Approval</span> Posters</h1>
        <div class="row">
            <div class="column">
                @foreach($definitions as $definition)
                    <div class="box">
                        <div class="box-header">
                            <a href="{{route('admin_single_definition',$definition->id)}}">
                                <h3 class="box-title"><strong>{{$definition->title}}</strong></h3>
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td>Text of Definition</td>
                                    <td>{{$definition->body}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Creator</strong></td>
                                    <td>{{$definition->user->name}}
                                    </td>

                                </tr>
                                <tr>
                                    <td><strong>Created At</strong></td>
                                    <td>{{$definition->created_at->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Action</strong></td>
                                    <form action="{{route('definition.approve',$definition->id)}}" method="post">
                                        {{csrf_field()}}
                                        <td><button class="btn btn-success">Approve</button> </td>
                                    </form>
                                    <form action="{{route('definition.delete',$definition->id)}}" method="post">
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
            {{$definitions->links()}}
        </div>
    </div>
@endsection