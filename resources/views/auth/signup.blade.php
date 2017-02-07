
<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="signup">
        <div class="form-group{{ $errors->has('cname') ? ' has-error' : '' }}">
                <label>Company Name</label>
                <input type="text" name="cname" class="form-control" placeholder="XYZ Corporation" value="{{Request::old('cname') ? : ''}}">

           @if ($errors->has('cname'))
                <span class="help-block">Company Name field is required</span>
            @endif

         </div>

         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="someone@example.com">
            @if ($errors->has('email'))
                <span class="help-block">{{$errors->first('email')}}</span>
            @endif
         </div>

          <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <label>User Type</label>
               <select name="type" class="form-control">
                 <option value="">Choose one</option>
                 <option value="0">Advertiser</option>
                 <option value="1">Developer</option>
               </select>
              @if ($errors->has('type'))
                  <span class="help-block">{{$errors->first('type')}}</span>
              @endif
            </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" id="password">
              @if ($errors->has('password'))
                  <span class="help-block">{{$errors->first('password')}}</span>
              @endif
            </div>
          <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Re-password" id="password">
              @if ($errors->has('confirm_password'))
                  <span class="help-block">{{$errors->first('confirm_password')}}</span>
              @endif
           </div>
          <div class="form-group">
            <a href="{{route('home')}}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-success pull-right" name="signup">Signup</button>
          </div>
          <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    @if($errors->any())
      $("#register").addClass('.modal show').removeClass('.modal fade');
    @endif
</script>