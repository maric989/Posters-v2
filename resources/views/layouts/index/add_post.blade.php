<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-top-wrap">
                    <div class="half">
                        <div class="append">Type</div>
                        <select name="test" id="myCombobox">
                            <option value="window-image">Image Post</option>
                            <option value="window-video">Video Post</option>
                            <option value="window-quote">Quote Post</option>
                        </select>
                    </div>
                    {{--<div class="half category-combobox">--}}
                        {{--<select name="test" id="categoryCombobox">--}}
                            {{--<option class="blue-background" value="SelectBoxIt is:" rel="#348dd1">Category #Obama Stuff</option>--}}
                            {{--<option class="red-background" value="a jQuery Plugin" rel="#d5aa27">Category #Lolcats</option>--}}
                            {{--<option class="green-background" value="a Select Box Replacement" rel="#38c574">Category #Tuts</option>--}}
                            {{--<option class="purple-background" value="a Stateful UI Widget" rel="#7e00ff">Category #Obama Stuff</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                </div>
                <div class="post-window window-video">
                    <div class="window-left">
                        <textarea class="form-control" rows="3" placeholder="Post title"></textarea>
                        <input type="text" class="form-control" placeholder="Paste your link here (Youtube, Vimeo)" value="http://vimeo.com/25924530"/>
                        <figure>
                            <div class="video-wrap">
                                <iframe width="560" height="315" src="//www.youtube.com/embed/wdX8y_xkz14" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </figure>
                    </div>
                    <aside>
                        <div class="outer">
                            <div class="inner">
                                <div class="custom-checkbox">
                                    <input type="checkbox" value="check1" name="check" id="check7" checked />
                                    <label for="check7">NSFW</label>
                                </div>
                                {{--<div class="custom-checkbox">--}}
                                    {{--<input type="checkbox" value="check1" name="check" id="check8" />--}}
                                    {{--<label for="check8">COMMENTS</label>--}}
                                {{--</div>--}}
                                {{--<div class="custom-checkbox">--}}
                                    {{--<input type="checkbox" value="check1" name="check" id="check9" />--}}
                                    {{--<label for="check9">ANONYMOUS</label>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="tags-wrap">
                            <h3>Tags:</h3>
                            <input name="tags" class="tags-selector" value="awesome,comic,lolcat" />
                        </div>
                    </aside>
                </div>
                <div class="post-window window-quote">
                    <div class="window-left">
                        <textarea class="form-control quote-input" rows="3" placeholder="“Edit this quote, use smart things!”"></textarea>
                        <div class="upload-wrap">
                             <span class="btn btn-success fileinput-button">
                                 <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                 <span>NOT A MUST</span><br /><br />
                                 <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                 <!-- The file input field used as target for the file upload widget -->
                                <input class="fileupload-init" type="file" name="files[]" rel="files-qoute">
                            </span>
                            <div id="files-qoute" class="files"></div>
                        </div>
                    </div>
                    <aside>
                        <div class="outer">
                            <div class="inner">
                                <div class="custom-checkbox">
                                    <input type="checkbox" value="check1" name="check" id="check13" checked />
                                    <label for="check13">NSFW</label>
                                </div>
                                {{--<div class="custom-checkbox">--}}
                                    {{--<input type="checkbox" value="check1" name="check" id="check14" />--}}
                                    {{--<label for="check14">COMMENTS</label>--}}
                                {{--</div>--}}
                                {{--<div class="custom-checkbox">--}}
                                    {{--<input type="checkbox" value="check1" name="check" id="check15" />--}}
                                    {{--<label for="check15">ANONYMOUS</label>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="tags-wrap">
                            <h3>Tags:</h3>
                            <input name="tags" class="tags-selector" value="awesome,comic,lolcat" />
                        </div>
                    </aside>
                </div>
                <div class="post-window window-image">
                    <div class="window-left">
                        <textarea class="form-control" rows="3" placeholder="Post title"></textarea>
                        <div class="upload-wrap">
                             <span class="btn btn-success fileinput-button">
                                 <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                 <span>NOT A MUST</span><br /><br />
                                 <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                 <!-- The file input field used as target for the file upload widget -->
                                <input class="fileupload-init" type="file" name="files[]" rel="files-photos">
                            </span>
                            <div id="files-photos" class="files"></div>
                        </div>
                    </div>
                    <aside>
                        <div class="outer">
                            <div class="inner">
                                <div class="custom-checkbox">
                                    <input type="checkbox" value="check1" name="check" id="check16" checked />
                                    <label for="check16">NSFW</label>
                                </div>
                                {{--<div class="custom-checkbox">--}}
                                    {{--<input type="checkbox" value="check1" name="check" id="check17" />--}}
                                    {{--<label for="check17">COMMENTS</label>--}}
                                {{--</div>--}}
                                {{--<div class="custom-checkbox">--}}
                                    {{--<input type="checkbox" value="check1" name="check" id="check18" />--}}
                                    {{--<label for="check18">ANONYMOUS</label>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="tags-wrap">
                            <h3>Tags:</h3>
                            <input name="tags" class="tags-selector" value="awesome,comic,lolcat" />
                        </div>
                    </aside>
                </div>
                <div class="post-window window-slider">
                    <div class="window-left small-padding">
                        {{--<div class="slider-numbers">--}}
                            {{--<ul>--}}
                                {{--<li><a href="#" rel="window-1" class="active">1</a></li>--}}
                                {{--<li><a href="#" rel="window-2">2</a></li>--}}
                                {{--<li><a href="#" rel="window-3">3</a></li>--}}
                                {{--<li><a href="#" rel="window-4">4</a></li>--}}
                                {{--<li><a href="#" rel="window-5">5</a></li>--}}
                                {{--<li><a href="#" rel="window-6">6</a></li>--}}
                                {{--<li><a href="#" rel="window-7">7</a></li>--}}
                                {{--<li><a href="#" rel="window-8">8</a></li>--}}
                                {{--<li><a href="#" rel="window-9">9</a></li>--}}
                                {{--<li><a href="#" rel="window-10">10</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        <div class="slider-selector">
                            <div class="window-1 slider-selector-window">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #1 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider1">
                                    </span>
                                    <div id="files-slider1" class="files"></div>
                                </div>
                            </div>
                            <div class="window-2 slider-selector-window window-hide">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #2 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider2">
                                    </span>
                                    <div id="files-slider2" class="files"></div>
                                </div>
                            </div>
                            <div class="window-3 slider-selector-window window-hide">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #3 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider3">
                                    </span>
                                    <div id="files-slider3" class="files"></div>
                                </div>
                            </div>
                            <div class="window-4 slider-selector-window window-hide">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #4 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider4">
                                    </span>
                                    <div id="files-slider4" class="files"></div>
                                </div>
                            </div>
                            <div class="window-5 slider-selector-window window-hide">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #5 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider5">
                                    </span>
                                    <div id="files-slider5" class="files"></div>
                                </div>
                            </div>
                            <div class="window-6 slider-selector-window window-hide">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #6 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider6">
                                    </span>
                                    <div id="files-slider6" class="files"></div>
                                </div>
                            </div>
                            <div class="window-7 slider-selector-window window-hide">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #7 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider7">
                                    </span>
                                    <div id="files-slider7" class="files"></div>
                                </div>
                            </div>
                            <div class="window-8 slider-selector-window window-hide">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #8 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider8">
                                    </span>
                                    <div id="files-slider8" class="files"></div>
                                </div>
                            </div>
                            <div class="window-9 slider-selector-window window-hide">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #9 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider9">
                                    </span>
                                    <div id="files-slider9" class="files"></div>
                                </div>
                            </div>
                            <div class="window-10 slider-selector-window window-hide">
                                <textarea class="form-control" rows="3" placeholder="How about a title?"></textarea>
                                <input class="form-control" placeholder="Slider #10 title" />
                                <div class="upload-wrap">
                                     <span class="btn btn-success fileinput-button">
                                         <span class="purple">OPTIONALLY BROWSE IMAGE</span><br />
                                         <span>NOT A MUST</span><br /><br />
                                         <span>PNG, GIF or JPG accepted. <br /> Max Size is 5MB.</span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <input class="fileupload-init" type="file" name="files[]" rel="files-slider10">
                                    </span>
                                    <div id="files-slider10" class="files"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside>
                        <div class="outer">
                            <div class="inner">
                                <div class="custom-checkbox">
                                    <input type="checkbox" value="check1" name="check" id="check10" checked />
                                    <label for="check10">NSFW</label>
                                </div>
                                {{--<div class="custom-checkbox">--}}
                                    {{--<input type="checkbox" value="check1" name="check" id="check11" />--}}
                                    {{--<label for="check11">COMMENTS</label>--}}
                                {{--</div>--}}
                                {{--<div class="custom-checkbox">--}}
                                    {{--<input type="checkbox" value="check1" name="check" id="check12" />--}}
                                    {{--<label for="check12">ANONYMOUS</label>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="tags-wrap">
                            <h3>Tags:</h3>
                            <input name="tags" class="tags-selector" value="awesome,comic,lolcat" />
                        </div>
                    </aside>
                </div>
                <div class="modal-bottom-menu">
                    <div class="half">
                        <button class="btn btn-link btn-block">Post It / Upload</button>
                    </div>
                    <div class="half">
                        <button class="btn btn-link btn-block alternate-btn">Preview</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
