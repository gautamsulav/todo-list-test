<div class="modal-body">
  <div class="row">
    <div class="form-group col-md-2">
      <label for="Name">Name:</label>
    </div>
    <div class="form-group col-md-8">

      <input type="text" class="form-control" name="name" id="name" value="{{!empty($group->name)? $group->name:''}}">
    </div>
  </div>
</div>

<script type="text/javascript">
  
    $('#submit-new-group').on('submit',function(e){
      e.preventDefault();
        var name = $('#name').val();
        var url=$('#submit-new-group').attr('action');
        
        $.ajax({
           type: "POST",
           headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
           url: url,
           dataType: "html",
           data: {name:name},
           success: function( data ) {
               $('#addNewGroup').modal('hide');
               $('#lists').empty();
               $('#lists').html(data);;
           }
        }); 
   });

   $('#update-new-group').on('submit',function(e){
      e.preventDefault();
        var name = $('#name').val();
        var url= $( '#update-new-group' ).attr( 'action' );
        
        $.ajax({
           type: "PATCH",
           headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
           url: url,
           dataType: "html",
           data: {name:name},
           success: function( data ) {
               $('#edit-group-modal').modal('hide');
               $('#lists').empty();
               $('#lists').html(data);;
           }
        }); 
   });





</script>
