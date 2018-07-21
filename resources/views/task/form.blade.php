<div class="modal-body">
  <div class="row">
    <div class="form-group col-md-2">
      <label for="Name">Name:</label>
    </div>
    <div class="form-group col-md-8">
      
      <input type="text" class="form-control" name="name" id="name" id="name" value="{{!empty($task->name)? $task->name:''}}">
    </div>
  </div>
  <div class="row">
      <div class="form-group col-md-2">
        <label for="Status">Status:</label>
      </div>
      
      <div class="form-group col-md-4">
        Completed:<input type="radio" name="status" value="completed" {{(!empty($task->complete) &&$task->complete==true)?'checked':''}}> 
      </div>
      <div class="form-group col-md-4">
         Not complete:<input type="radio" name="status" value="notcompleted" {{(!empty($task->complete)&&$task->complete==false)? 'checked' :''}}>
      </div>
    </div>
  <div class="row">
    <div class="form-group col-md-2">
    <label for="Name">Select Group:</label>
    </div>
    <div class="form-group col-md-6">
        <select name="group" id="group_id" >
          @foreach($groups as $group)
          <option value="{{$group['id']}}">{{$group['name']}}</option>
          @endforeach 
        </select>
    </div>
  </div>
</div>

<script type="text/javascript">
  
    $('#submit-new-task').on('submit',function(e){
      e.preventDefault();
        var name = $('#name').val();
        var group = $('#group_id').val();
        var status='completed'; 
        var url=$('#submit-new-task').attr('action');
        
        $.ajax({
           type: "POST",
           headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
           url: url,
           dataType: "html",
           data: {name:name, group:group, status:status},
           success: function( data ) {
               $('#addNewData').modal('hide');
               $('#lists').empty();
               $('#lists').html(data);;
           }
        }); 
   });

   $('#update-new-task').on('submit',function(e){
      e.preventDefault();
        var name = $('#name').val();
        var group = $('#group_id').val();
        var status='completed'; 
        var url= $( '#update-new-task' ).attr( 'action' );
        
        $.ajax({
           type: "PATCH",
           headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
           url: url,
           dataType: "html",
           data: {name:name, group:group, status:status},
           success: function( data ) {
               $('#edit').modal('hide');
               $('#lists').empty();
               $('#lists').html(data);;
           }
        }); 
   });





</script>

