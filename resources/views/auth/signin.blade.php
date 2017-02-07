
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login using email</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="signin">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"  placeholder="someone@example.com">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control"  placeholder="Password">
            </div>

            <div class="form-group">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-success pull-right" name="login">Login</button>
            </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
      </div>
    </div>
  </div>
</div>