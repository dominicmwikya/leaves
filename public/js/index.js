$(document).ready(function(){
		  $('#register_user_form').submit(function(event){
		     event.preventDefault();
		      $.ajax({
                 type:'POST',
                 url:"<?php  echo base_url('employeecreate'); ?>",
                 data:new FormData(this),
                 dataType:'json',
                 processData:false,
                 contentType:false,
                 cache:false,
             }).done(function(response){
              if(response.code==1){
                console.log(response)
                // $('#show_message').text(response.message);
                // $('#successs_card').show();
                //     setTimeout(function() {
                //         jQuery('#myModal').modal('hide');
                //              window.location.reload();    
                //               }, 3500);
                 }
                 // if(response.code==0){
                 //     $('#fail_message').text(response.error);
                 //     $('#fail_card').show();
                 //      setTimeout(function() {
                 //         jQuery('#myModal').modal('hide');
                 //             window.location.reload();    
                 //              }, 3500);

                 // }
             });
		});
});