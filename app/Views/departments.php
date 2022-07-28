<?=$this->extend('main_view') ?>
<?=$this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h4>DASHBOARD / <span>DEPARTMENTS</span> </h4>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><span class="material-icons">
       add </span>NEW Department</button>
	    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD DEPARTMENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="create_department">
                	<div id="success_alert" style="display:none;">
                              <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> <div id="success_message"></div></h4>
                              </div>
                         </div>
                         <div id="error_alert" style="display:none;">
                              <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> <div id="error_message"></div></h4>
                              </div>
                         </div>
                    <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="form6Example1" class="form-control" name="d_name" />
                            <label class="form-label" for="form6Example1">department name</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                           <input type="submit" name="submit" class="btn btn-primary btn-block" value="ADD DEPARTMENT">
                        </div>
                    </div>
                </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">x</button>
                
              </div>
            </div>
          </div>
        </div>
    </div>
 
<div class="row">
	<div class="col-md-10">
		<div class="card">
			<div class="card-header"> <h3>DEPARTMENBTS</h3></div>
			<div class="card-body">
				<table class="table table-bordered">
				<thead>
					<tr>
                        <td>#</td>
						<td>DEPARTMENT NAME</td>
						<td>DELETE</td>
						<td>Edit</td>
					</tr>
				</thead>
				<tbody>
					<?php if($code==1):
						foreach ($data as $value): ?>
						<tr>
						<td><?php echo $value['id']; ?></td>
						<td><?php echo $value['departName']; ?></td>
                        <td><a href="javascript:void(0);"><span class="material-icons">delete</span></a></td>
						<td><a href="javascript:void(0);"><span class="material-icons">edit</span></a></td>
					
					</tr>
					<?php endForeach; endIf;?>
					
				</tbody>
			</table>
			</div>
		</div>
</div>
</div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#create_department').submit(function(event){
                 event.preventDefault();
                 $.ajax({
                         type:'POST',
                         url:'<?php  echo base_url('department-add'); ?>',
                         data:new FormData(this),
                         dataType:'json',
                         processData:false,
                         contentType:false,
                         serverSide: false,
                         cache:false,
                     }).done(function(response){
                     	console.log(response);
                            if(response.code==1){
				                $('#success_message').text(response.message);
				                $('#success_alert').show();
				                    setTimeout(function() {
				                        jQuery('#exampleModal').modal('hide');
				                             window.location.reload();    
				                              }, 3500);
				                 }
			                 if(response.code==0){		                
			                    $('#error_message').text(JSON.stringify(response.error));
			                     $('#error_alert').show();
			                      setTimeout(function() {
			                      	$('#error_alert').hide();    
			                              }, 3500);
			                 }

                     });
        });


  	});
  </script>
<?= $this->endSection('content') ?>