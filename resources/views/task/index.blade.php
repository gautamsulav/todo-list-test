@extends('master')
@section('content')

<div class="container">
  <button type="button" class="btn btn-primary add-new-data" data-toggle="modal" 
        style="display: flex; justify-content: flex-end; margin-top: 50px;">
       Add New Task
  </button> 
  <div id="lists">
  	@include('task\tasklist')
  </div>
  
</div>
<div id="displayDiv"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.add-new-data').on('click',function(){
	       $.ajax({
	          type: "GET",
	          url: 'tasks/create',
	          dataType: "html",
	          success: function(response){
	              $('#displayDiv').html(response); 
	              $('#addNewData').modal('show');
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
  
