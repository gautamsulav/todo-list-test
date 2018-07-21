@extends('master')
@section('content')

<div class="container">
  <button type="button" class="btn btn-primary add-new-group" data-toggle="modal" 
        style="display: flex; justify-content: flex-end; margin-top: 50px;">
       Add New Group
  </button> 
  <div id="lists">
    @include('group\grouplist')
  </div>
  
</div>
<div id="displayDiv"></div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.list-task-by-group').on('click',function(){
      var url=$(this).data('link');
      $.ajax({
            type: "GET",
            url: url,
            dataType: "html",
            success: function(data){
                $('#lists').empty();
                $('#lists').html(data);
            },
            error: function(e) {
                alert('Error: ' + e);
            }
          });
    });
    $('.add-new-group').on('click',function(){
         $.ajax({
            type: "GET",
            url: 'groups/create',
            dataType: "html",
            success: function(response){
                $('#displayDiv').html(response); 
                $('#addNewGroup').modal('show');
            },
            error: function(e) 
            {
                alert('Error: ' + e);
            }
          });    
      });

  });
</script>

@stop
  