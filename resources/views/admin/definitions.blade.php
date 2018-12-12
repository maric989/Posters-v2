@extends('admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="column">
                @foreach($definitions as $definition)
                    <div class="col-md-4">
                        <a href="{{route('admin_single_definition',$definition->id)}}">
                            <h3>{{$definition->title}}</h3>
                        </a>
                        <div class="article-content">
                            <div class="quote-wrap">
                                <div class="quote" style="word-wrap: break-word;">
                                    <p>&ldquo; {{$definition->body}} &rdquo;</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        @if($definition->approved)
                            <button class="btn btn-success">Approved</button>
                        @else
                            <button class="btn btn-danger">Not Approved</button>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row" style="text-align: center">
            {{$definitions->links()}}
        </div>
    </div>
@endsection