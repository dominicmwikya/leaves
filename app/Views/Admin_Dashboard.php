<?=$this->extend('main_view') ?>
<?=$this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h4>DASHBOARD / <span>ADMIN</span> </h4>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target=".add_role">Create New Role</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">ADD LEAVE</button>
	    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-md" style="margin-top: 5%;">
          <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title">ADD NEW CATEGORY</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="success_div alert alert-success" style="display: none;"></div>
             <div class="fail_div alert alert-danger" style="display: none;"></div>
              <div class="modal-body">
                  <form id="create_category">
                    <input type="hidden" name="emp_id" class="form-control" value="<?php echo $_SESSION['id'];?>" id="id">
                      <div class="success"></div>
                      <div class="fail"></div>
                      <div class="form-group has-feedback">
                        <input type="text" name="category"id="category" class="form-control" placeholder="category name" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div><div class="name_errors"></div>
                      <div class="form-group has-feedback">
                        <input type="number" name="leave_length"id="leave_length"class="form-control" placeholder="length" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      </div><div class="length_errors"></div>
                      <div class="form-group has-feedback">
                        <input type="number" name="amount" class="form-control" placeholder="Amount Optional" required>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                      </div><div class="pass_errors"></div>
                      <div class="row">
                        <div class="col-xs-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">ADD</button>
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

        <!-- //strat -->
        <div class="modal fade add_role" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" style="margin-top: 5%;">
          <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title">CREATE NEW ROLE</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="success_div alert alert-success" style="display: none;"></div>
             <div class="fail_div alert alert-danger" style="display: none;"></div>
              <div class="modal-body">
                  <form id="user_role_form">
                      <div class="success"></div>
                      <div class="fail"></div>
                      <div class="form-group has-feedback">
                        <input type="text" name="role_name"id="role_name" class="form-control" placeholder="USER ROLE" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div><div class="name_errors"></div>
                     
                      <div class="row">
                        <div class="col-xs-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat " style="margin-left: 100px;" >Create New Role</button>
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
        <!-- //end -->
    </div>
   <div class="row">
   	 <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Employees</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $employeeCount; ?></div>
                    </div>
                   
                </div>
            </div>
        </div>
     </div>
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            TERMINATED</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                    </div>
                   
                </div>
            </div>
        </div>
     </div>
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Leave Categories</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $CountCategory; ?></div>
                    </div>
                   
                </div>
            </div>
        </div>
     </div>
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Departments</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $departmentCount; ?></div>
                    </div>
                   
                </div>
            </div>
        </div>
     </div>
   </div>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header"> <h3>LEAVE CATEGORIES</h3></div>
			<div class="card-body">
				<table class="table table-striped">
					<thead class="thead-dark">
                      <tr>
                        <td>LEAVE CATEGORY</td>
                        <td>DURATION</td>
                        <td>AMOUNT EXPECTED</td>
                        <td>ACTION</td>
                    </tr>               
                    </thead>
    				<tbody>
                        <?php if($code==1): foreach($data as $values):?>
    					<tr>
    						<td><?php echo $values['category_name']; ?></td>
    						<td><?php echo $values['cat_length']; ?>days</td>
    						<td>Ksh. <?php echo $values['amount']; ?></td>
    						<td>
                                <div class="pmd-dropdown">
                                <button class="btn pmd-btn-fab pmd-ripple-effect pmd-btn-flat" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons pmd-sm">more_vert</i></button>
                                    <div class="dropdown-menu">
                                        <h6 class="dropdown-header"></h6>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                        <span class="material-icons">edit</span>Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                        <span class="material-icons">delete</span>Delete</a>
                                    </div>
                                </div>
                          </td>
    					</tr>
                        <?php endForeach; endIf; ?>
    				</tbody>
			    </table>
			</div>
		</div>
    </div>

<!-- End -->
    <div class="col-md-4 mr-2">
        <div class="card">
            <div class="card-header"> <h3>USE ROLES</h3></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <td>#</td>
                        <td>USER_ROLE</td>
                        <td>ACTION</td>
                    </tr>               
                    </thead>
                    <tbody>
                        <?php if($code==1): foreach($Userroles as $role):?>
                        <tr>
                            <td><?php echo $role['id']; ?></td>
                            <td><?php echo $role['Role']; ?></td>
                            <td><div class="pmd-dropdown">
                                <button class="btn pmd-btn-fab pmd-ripple-effect pmd-btn-flat" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons pmd-sm">more_vert</i></button>
                                <div class="dropdown-menu">
                                <h6 class="dropdown-header"></h6>
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <span class="material-icons">edit</span>Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <span class="material-icons">delete</span>Delete</a>
                                </div>
                            </div></td>
                        </tr>
                        <?php endForeach; endIf; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        //submit leave category
          $('#create_category').submit(function(event){
             event.preventDefault();
             $.ajax({
                         type:'POST',
                         url:'<?php  echo base_url('category-create'); ?>',
                         data:new FormData(this),
                         dataType:'json',
                         processData:false,
                         contentType:false,
                         cache:false,
                     }).done(function(response){
                      console.log(response);
                      if(response.code==1){
                        $('.success_div').text(response.message);
                        $('.success_div').show();
                            setTimeout(function() {
                                     window.location.reload();    
                                      }, 2000);
                         }
                         if(response.code==0){
                             $('.fail_div').text(response.error);
                             $('fail_div').show();
                         }
                     });
        });
  //end
  // submit user role
      $('#user_role_form').submit(function(event){
             event.preventDefault();
             $.ajax({
                         type:'POST',
                         url:'<?php  echo base_url('role-create'); ?>',
                         data:new FormData(this),
                         dataType:'json',
                         processData:false,
                         contentType:false,
                         cache:false,
                     }).done(function(response){
                      // console.log(response);
                      if(response.code==1){
                        $('#user_role_form').trigger("reset");
                        $('.success_div').text(response.message);
                        $('.success_div').show();
                            setTimeout(function() {
                                     window.location.reload();    
                                      }, 3000);
                         }
                         if(response.code==0){
                             $('.fail_div').text(response.error);
                             $('fail_div').show();
                             setTimeout(function(){
                                  $('fail_div').hide();
                             },3500);
                         }
                     });
        });
  // end role submit
    });
</script>
<?= $this->endSection('content') ?>