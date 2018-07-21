<script type="text/javascript">
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

    

    $('.delete-task').on('submit',function(e){
        e.preventDefault();
        var url= $(this ).attr( 'action' );
        $.ajax({
           type: "DELETE",
           headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
           url: url,
           dataType: "html",
           success: function( data ) {
               $('#lists').empty();
               $('#lists').html(data);
           }
        }); 
   });

  });
</script>
