<div class="modal fade" id="edit-group-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modalContent">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Group</h4>
      </div> 
    <form method="post" action="{{action('GroupController@update',$group->id)}}" id="update-new-group"enctype="multipart/form-data"> 
      @csrf
      <input name="_method" type="hidden" value="PATCH">
      <input type="hidden" id="data_id" name="id" value="{{$group->id}}">
        @include('group.form')  
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save </button>
      </div>
    </form>
   </div>
  </div>
</div> 