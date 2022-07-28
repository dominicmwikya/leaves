<?=$this->extend('main_view') ?>
<?=$this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h4>DASHBOARD | <span>EMPLOYEE</span> </h4>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="material-icons">add </span>NEW EMPLOYEE</button>
	    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-lg" style="margin-top: 5%;">
         <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title">ADD EMPLOYEE</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="success_div" style="display: none;"></div>
             <div class="fail_div" style="display: none;"></div>
              <div class="modal-body">
                <form id="register_user_form">
							  <!-- 2 column grid layout with text inputs for the first and last names -->
							<div class="row mb-4">
								<div class="col">
									<div class="form-outline">
										<input type="text" id="form6Example1" class="form-control" name="firstName" />
										<label class="form-label" for="form6Example1">First name</label>
									</div>
								</div>
								<div class="col">
									<div class="form-outline">
									<input type="text" id="form6Example2" class="form-control" name="secondName"/>
									<label class="form-label" for="form6Example2">Last name</label>
									</div>
							   </div>
							</div>
                         <!--  -->
							   <div class="row mb-4">
								    <div class="col">
								      <div class="form-outline">
								        <input type="text" id="form6Example1" class="form-control" name="empNO" />
								        <label class="form-label" for="form6Example1">EmpNo</label>
								      </div>
								    </div>
								    <div class="col">
								      <div class="form-outline">
								        <input type="email" id="form6Example2" class="form-control"  name="email"/>
								        <label class="form-label" for="form6Example2">email Address</label>
								      </div>
							         </div>
							     </div>
							  <!--  -->
							   <div class="row mb-4">
								    <div class="col">
								      <div class="form-outline">
									      	<?php if($departments):  ?>
										        <select class="form-control form-control" name="Department">
									        	    <option value="" selected disabled>Select Department</option>
											        	<?php foreach($departments as $department): ?>
														     <option value="<?php echo $department['departName']; ?>"><?php echo $department['departName']; ?></option>
														     <?php   endForeach; ?>
													 </select>
									    		<?php endif; ?>
								        <label class="form-label" for="form6Example1">Department</label>
								      </div>
							        </div>
								    <div class="col">
								      <div class="form-outline">
								      		<?php if($designations):  ?>
										        <select class="form-control form-control" name="Designation">
										        	 <option value="" selected disabled>Select User Role</option>
										        	<?php foreach($designations as $designation): ?>
													     <option value="<?php echo $designation['designation_name']; ?>"><?php echo $designation['designation_name']; ?></option>
													     <?php   endForeach; ?>
												  	</select>
									      	<?php endif; ?>
								        <label class="form-label" for="form6Example2">Designation</label>
								      </div>
								    </div>
							    </div>
							   <!-- Text input -->
							    <div class="row mb-4">
								    <div class="col">
								      <div class="form-outline">
								        <input type="text" id="form6Example1" class="form-control"  name="phone" />
								        <label class="form-label" for="form6Example1">Phone No</label>
								      </div>
								    </div>
								    <div class="col">
								    	<div class="form-outline">
								        <input type="file" id="form6Example1" class=" form-control" name="Passport" />
								        <label class="form-label" for="form6Example1">Passport Photo</label>
								      </div>
								    </div>
							    </div>
							  <!-- Text input -->
							    <div class="row mb-4">
							    	<div class="col">
								      <div class="form-outline">
								        <input type="date" id="form6Example2" class="form-control" name="DoB" />
								        <label class="form-label" for="form6Example2">DOb</label>
								      </div>
								    </div>
								    <div class="col">
								      <div class="form-outline">
								        <input type="date" id="form6Example1" class=" form-control"  name="dateJoined" />
								        <label class="form-label" for="form6Example1">Date of Joining</label>
								      </div>
								    </div>
							     </div>
							     <div class="row mb-4">
								    <div class="col">
								      <div class="form-outline">
								      	<?php if($Userroles):  ?>
								       <select class="form-control col-md-6" name="user_type">
								       	<option value="" selected disabled>Select User Type</option>
								       	<?php foreach($Userroles as $role):  ?>
								       	<option value="<?php  echo  $role['Role']; ?>"><?php echo $role['Role'];   ?></option>
								       	<?php  endForeach;  ?>
								       </select>
								     <?php  endif;  ?>
								        <label class="form-label" for="form6Example1">User Type</label>
								      </div>
								    </div>
							     </div>
							      
							     <div class="row mb-4">
								    <div class="col">
								      <div class="form-outline">
								        <input type="password" id="form6Example1" class=" form-control" name="password"/>
								        <label class="form-label" for="form6Example1">password</label>
								      </div>
								    </div>
								    <div class="col">
								      <div class="form-outline">
								        <input type="password" id="form6Example2" class="form-control" name="retype_password" />
								        <label class="form-label" for="form6Example2">Confirm password</label>
								      </div>
								    </div>
							     </div>
							     <div id="error_alert" style="display:none;">
					                <div class="alert alert-danger alert-dismissible">
					                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					                    <h4><i class="icon fa fa-check"></i> <div id="error_message"></div></h4>
					                </div>
					            </div>
					            <div id="success_alert" style="display:none;">
					                <div class="alert alert-success alert-dismissible">
					                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					                    <h4><i class="icon fa fa-check"></i> <div id="success_message"></div></h4>
					                </div>
					            </div>
							  <!--  -->
							   <!-- Submit button -->
							   <input type="submit" class="btn btn-primary"name="SUBMIT" value="ADD USER">
						</form>
               </div>
		          <div class="modal-footer">
		              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
		          </div>
            </div>
         </div>
	    </div>
       </div>
       <!-- end modal -->
<div class="row">
	<div class="col-md-3">
		<input type="text" name="em_name" class="form-control" placeholder="EMPLOYEE NAME">
	</div>
	<div class="col-md-3">
		<input type="text" name="em_name" class="form-control" placeholder="EMPLOYEE ID">
	</div>
	<div class="col-md-3 ">
		<?php if($designations):  ?>
      <select class="form-control form-control" name="Designation">
      	 <option value="" selected disabled>Select User Role</option>
      	<?php foreach($designations as $designation): ?>
		     <option value="<?php echo $designation['designation_name']; ?>"><?php echo $designation['designation_name']; ?></option>
		     <?php   endForeach; ?>
		</select>
   	<?php endif; ?>
	</div>
	<div class="col-md-3">
		<button class="btn btn-success btn-block">SEARCH </button>
	</div>
</div>
   <div class="row staff-row">
   	<?php if($data):
   	foreach($data as $dat): ?>
         <div class="col-xl-3 col-md-6 mt-4">
			<div class="card">
				<div class="d-flex flex-row">
					<img class="card-img-left example-card-img-responsive" style="height:120px; width:120px;" src="/img/undraw_profile.svg"/>
					<div class="card-body">
						<div class="pmd-dropdown">
							<button class="btn pmd-btn-fab pmd-ripple-effect pmd-btn-flat" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons pmd-sm">more_vert</i></button>
							<div class="dropdown-menu">
							<h6 class="dropdown-header"></h6>
							<a class="dropdown-item" href="javascript:void(0);" onclick="user_edit(<?php echo $dat['id'] ?> );">
								<span class="material-icons">edit</span>Edit</a>
							<a class="dropdown-item" href="javascript:void(0);" onclick="user_delete(<?php echo $dat['id'] ?> );">
								<span class="material-icons">delete</span>Delete</a>
							</div>
						</div>
					</div>
				</div>
				<div class="small text-muted ml-5"><?php echo $dat['emp_name'] ?> </div>
				<div class="small text-muted  ml-5"><?php echo $dat['Designation'] ?> </div>
			</div>
       </div>
   	<?php endForeach;?>
   		<?php else:  echo $message['message'];   endif;  ?>
    </div>
    <!-- User edit modal -->
    <div class="modal fade" id="edit_modal">
                <div class="modal-dialog modal-md" style="margin-top: 5%;">
                  <div class="modal-content">
                    <div class="modal-header"><h4 class="modal-title">EDITING  USER <span id="user_id"></span> </h4> 
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="update-success"></div>
                      <div class="modal-body"> 
                        <div id="success_update" style="display:none;">
                              <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> <div id="update_message"></div></h4>
                              </div>
                         </div>
                         <div id="fail_card" style="display:none;">
                              <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> <div id="fail_message"></div></h4>
                              </div>
                         </div>
                          <form id="edit_user_form">
                              <div class="form-group has-feedback">
                                <input type="text" name="edited_name" id="edit_name" class="form-control" required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div><div class="name_errors"></div>
                              <div class="form-group has-feedback">
                                <input type="email" name="edited_email" id="edit_email"class="form-control"  required>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                              </div><div class="email_errors"></div>
                               <div class="form-group has-feedback">
                               		<?php if($Userroles):  ?>
															       <select class="form-control select2" name="edited_category" id="category" required>
															       	<option value="" selected disabled>Select User Type</option>
															       	<?php foreach($Userroles as $role):  ?>
															       	<option value="<?php  echo  $role['Role']; ?>"><?php echo $role['Role'];   ?></option>
															       	<?php  endForeach;  ?>
															       </select>
															     <?php  endif;  ?>
                              
                              <span class="glyphicon glyphicon-user form-control-feedback"></span><div class="user_errors"></div>
                              </div>
                               <div class="form-group has-feedback">
                               	<?php if($designations): ?>
                                   <select class="form-control form-control" name="Designation">
															      	 <option value="" selected disabled>Select User Role</option>
															      	<?php foreach($designations as $designation): ?>
																	     <option value="<?php echo $designation['designation_name']; ?>"><?php echo $designation['designation_name']; ?></option>
																	     <?php   endForeach; ?>
																	</select>
															   	<?php endif; ?>
                              <span class="glyphicon glyphicon-user form-control-feedback"></span><div class="user_errors"></div>
                              </div> 
                                 <input type="hidden"  id="edit_id" name="user_edit_id" >
                              <div class="row">
                                <div class="col-xs-4">
                                  <button type="submit" class="btn btn-primary btn-block btn-flat">Update User</button>
                                </div>
                              </div>
                         </form> 
                      </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  </div>
                  </div>
                </div>
             </div>

    <!-- end user edit modal -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script type="text/javascript">
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
             	 console.log(response)
              if(response.code==1){
              	console.log(response);
                $('#success_message').text(response.message);
                $('#success_alert').show();
                    setTimeout(function() {
                        jQuery('#myModal').modal('hide');
                             window.location.reload();    
                              }, 3500);
                 }
                 if(response.code==0){
                     $('#error_message').text(response.error);
                     $('#error_alert').show();
                      setTimeout(function() {
                      	$('#error_alert').hide();    
                              }, 3500);
                 }
             });
		});

		 user_edit=function(id){
		    $.ajax({
		              type: 'GET',
		              url: '<?php echo base_url('employee-edit'); ?>',
		              data: {'id': id },
		              dataType: 'json',
		              success: function(results) {
		                 $('#user_id').text(id);
		                 var data= results[0];
		                  var edit_id=data.id;
		                  $('#edit_name').val(data.emp_name);
		                  $('#edit_id').val(edit_id);
		                  $('#edit_email').val(data.emp_email);
		                  var depart= data.emp_depart;
		                  var user_category=data.emp_type;
		                  $('#select').append('<option selected='+depart+'>'+depart+ '</option>');
		                  $('#category').append('<option selected='+user_category+'>'+user_category+ '</option>');
		                  jQuery('#edit_modal').modal('show');               
		               }
		           }); 
		         }
		 user_delete= function(id){
						   alert('Deleting'+'  Employee with  id ' +id);
						    var isDelete= confirm("Are you sure you want to delete employee ID  "+id +' ?');
						      if(isDelete==true){
						          $.ajax({
						            type:'POST',
						            url: '<?php echo base_url('employee-delete'); ?>',
						            data:{'id':id},
						            dataType:'json',
						            success:function(resp){
						              if(resp.code==1){
						                    $('#delete_message').text(resp.message);
						                    $('#delete_card').show();
						              setTimeout(function(){
						                window.location.reload();
						              },3000); 
						              }
						              else{
						                alert(resp.error);
						              }
						            }
						          });
						      }   
						}
		//user edit form submit
				$('#edit_user_form').submit(function(event){
				     event.preventDefault();
				     $.ajax({
				                 type:'POST',
				                 url:'<?php  echo base_url('employee-update'); ?>',
				                 data:new FormData(this),
				                 dataType:'json',
				                 processData:false,
				                 contentType:false,
				                 cache:false,
				             }).done(function(response){
				              console.log(response);
				              if(response.code==1){
				                $('#update_message').text(response.message);
				                $('#success_update').show();
				                    setTimeout(function() {
				                         jQuery('#myModal').modal('hide');
				                             window.location.reload();    
				                              }, 3500);
				                 }
				                 if(response.code==0){
				                     $('#fail_message').text(response.error);
				                     $('#fail_card').show();
				                 }
				             });
				});
//end user edit submit form.
});
    </script>
<?= $this->endSection('content') ?>