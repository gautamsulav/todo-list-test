 <div class="modal fade" id="addNewData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add New Task</h4>
        </div>
        <form method="post" action="{{url('tasks')}}" id="submit-new-task" enctype="multipart/form-data">  
            @csrf
            @include('task.form')  

         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save </button>
          </div>
        </form>
      </div>
    </div> 
</div>  


 