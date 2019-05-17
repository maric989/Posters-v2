@extends('welcome')

@section('content')
    @include('layouts.flash_message')

    <form action="{{route('store.poster')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="post-window window-image">
            <div class="window-left">
                @if ($errors->has('title'))
                    <span>
                    <strong style="color: red">{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                <textarea class="form-control" rows="3" placeholder="Post title" name="title"></textarea>
                <div class="upload-wrap">
                                 <span class="btn btn-success fileinput-button">
                                     <span class="purple">DODAJ POSTER</span><br/>
                                     <span></span><br/><br/>
                                     <span>PNG, GIF ili JPG samo. <br/> Max Velicina fajla je 5MB.</span>
                                     <!-- The file input field used as target for the file upload widget -->
                                    {{--<input class="fileupload-init" type="file" name="files[]" rel="files-photos">--}}
                                         <input type="file" name="posterImg" id="fileToUpload">

                                </span>
                    <div id="files-photos" class="files"></div>
                    @if ($errors->has('posterImg'))
                        <span>
                    <strong style="color: red">{{ $errors->first('posterImg') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <aside>
                <div class="outer">
                    <div class="inner">
                        <div class="custom-checkbox">
                            <input type="checkbox" value="check1" name="check" id="check16" checked/>
                            <label for="check16">NSFW</label>
                        </div>
                    </div>
                <div class="tags-wrap">
                    <h3>Tags:</h3>
                    <input name="tags" class="tags-selector" />
                </div>
                    <div class="tags-wrap">
                        <h3>Kategorija:</h3>
                        <select class="mdb-select md-form" name="category">
                            <option value="" disabled selected>Choose your option</option>
                            @foreach($categories as $category)
                                <option name="category" value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </aside>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 2rem">Submit</button>
    </form>

@endsection
