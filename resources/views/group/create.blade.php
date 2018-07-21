 <div class="modal fade" id="addNewGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add New Group</h4>
        </div>
        <form method="post" action="{{url('groups')}}" id="submit-new-group" enctype="multipart/form-data">  
            @csrf
            @include('group.form')  

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save </button>
          </div>
        </form>
      </div>
    </div>
  </div>  