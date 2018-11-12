<form action="{{route('register')}}" method="POST">
    {{csrf_field()}}
    <div class="col-sm-7 border-right">
        <div class="input-group">
            <span class="input-group-addon">Email:</span>
            <input type="text" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon">Username:</span>
            <input type="text" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon">Password:</span>
            <input type="password" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon">Repeat Password:</span>
            <input type="password" class="form-control">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="vertical-half">
            <div class="custom-checkbox">
                <input type="checkbox" value="check1" name="check" id="check1" checked />
                <label for="check1">GAGS OF THE WEEK</label>
            </div>
            <div class="custom-checkbox">
                <input type="checkbox" value="check1" name="check" id="check2" />
                <label for="check2">NEWSLETTER</label>
            </div>
        </div>
        <div class="vertical-half">
            <div class="custom-checkbox-vertical custom-checkbox">
                <p>I promise only to have fun here and I fully agree with the</p>
                <input type="checkbox" value="check1" name="check" id="agreeTerms" />
                <label for="agreeTerms">Terms of Agreement.</label>
            </div>
        </div>
    </div>
    </div>
    {{--<div class="modal-footer">--}}
        {{--<input id="register-button" type="submit" value="NICE, REGISTER ME!" class="btn btn-primary btn-block custom-button" />--}}
        {{--<a id="error-button" class="btn btn-block btn-info custom-button" href="#">WHY DON’T YOU AGREE WITH OUR ToA?</a>--}}
    {{--</div>--}}
    <button type="submit"> submit</button>
</form>