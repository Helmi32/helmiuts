$(document).ready(function(){

    $('#keyword').on('keyup', function(){
        $('.loader').show();
  
  
        $.get('ajax/datamajalah.php?keyword='+ $('#keyword').val(), function (data) {
          $('.container').html(data);
                $('.loader').hide();
        });
  
      });
  
    });
  