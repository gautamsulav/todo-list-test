$(document).ready(function(){
      $('.openPopup').on('click',function(){
        var id = $(this).attr('data-id');
        var ajaxUrl="tasks/"+id+"/edit";
        $.ajax({
          type: "GET",
          url: ajaxUrl,
          dataType: "html",
          success: function(response){
              $('#displayDiv').html(response);
              $('#edit').modal('show');
          },
          error: function(e) 
          {
              alert('Error: ' + e);
          }
        });       
    }); 

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

    $('#deleteTask').on('submit',function(e){
        e.preventDefault();
        var url= $( '#myForm' ).attr( 'action' );
        $.ajax({
           type: "DELETE",
           headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
           url: url,
           dataType: "html",
           success: function( data ) {
               $('#lists').empty();
               $('#lists').html(data);;
           }
        }); 
   });

  });