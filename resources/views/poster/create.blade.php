@extends('welcome')

@section('content')

    <form action="{{route('store.poster')}}" method="post">
        {{csrf_field()}}
        <div class="post-window window-image">
            <div class="window-left">
                <textarea class="form-control" rows="3" placeholder="Post title" name="title"></textarea>
                <div class="upload-wrap">
                                 <span class="btn btn-success fileinput-button">
                                     <span class="purple">DODAJ POSTER</span><br/>
                                     <span></span><br/><br/>
                                     <span>PNG, GIF ili JPG samo. <br/> Max Velicina fajla je 5MB.</span>
                                     <!-- The file input field used as target for the file upload widget -->
                                    {{--<input class="fileupload-init" type="file" name="files[]" rel="files-photos">--}}
                                         <input type="file" name="fileToUpload" id="fileToUpload">

                                </span>
                    <div id="files-photos" class="files"></div>
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
                </div>
            </aside>
        </div>
        <button type="submit">Submit</button>
    </form>

@endsection