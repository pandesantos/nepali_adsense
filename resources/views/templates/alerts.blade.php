@if(Session::has('info'))
<div class="modal show" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Success Message</h4>
      </div>
      <div class="modal-body modal-success">
       <div class="alert alert-success">
            {{Session::get('info')}}
       </div>
      </div>
      <div class="modal-footer">
        <a href="{{route('home')}}" class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
@endif