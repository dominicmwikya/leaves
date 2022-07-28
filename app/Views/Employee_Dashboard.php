<?=$this->extend('main_view') ?>
<?=$this->section('content') ?> 
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h4>DASHBOARD / <span>Leaves</span> </h4>
    <button class="btn btn-success">View PaySlip</button>
    <button class="btn btn-success">P9 forms</button>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="material-icons">
       add </span>NEW LEAVE</button>
	    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-md" style="margin-top: 5%;">
          <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title">APPLY NEW LEAVE</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="success_div" style="display: none;"></div>
             <div class="fail_div" style="display: none;"></div>
              <div class="modal-body">
                 <form name="checkit" id="leave_form">
                    <input type="hidden" name="emp_id" class="form-control" value="<?php echo $_SESSION['id'];?>" id="hidden">
                    <div class="alert alert-danger" id="fail_alert" style="display:none;">
                        <p id="fail_message"></p>
                    </div>
                    <div class="alert alert-success" id="success_alert" style="display:none;">
                        <p id="success_message"></p>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                          <div class="form-outline">
                            <select type="text" class="form-control" onInput="checkform()" name="leave_type"  id="select_leave_type" >
                                <option value=""selected disabled>Select leave Type</option>
                            </select>
                            <label class="form-label" for="form6Example1">Leave Type</label>
                          </div>
                        </div>
                    </div>
                     <div class="row mb-4">
                        <div class="col">
                          <div class="form-outline">
                            <select class="form-control" name="Applied_To" required  onInput="checkform()">
                                <option value="" selected disabled>Supervisor</option>
                                <option value="ict">ICT MANAGER</option>
                                <option value="technical">TECHNICAL MANAGER</option>
                                <option value="hr"> HR</option>
                            </select>
                            <label class="form-label" for="form6Example1">Your Supervisor</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-outline">
                            <?php if($employees): ?>
                            <select class="form-control" name="releaver"  onInput="checkform()">
                                <option value=""selected disabled>Releaver</option>
                                <?php foreach($employees as $employee): ?>
                                <option value="<?php echo $employee['emp_name'];?>"><?php echo $employee['emp_name'];?> </option>
                                <?php endForeach; ?>
                            </select>
                             <?php endIf; ?>
                            <label class="form-label" for="form6Example1">Releaver</label>
                          </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                          <div class="form-outline">
                            <input type="date" id="start_date" class="  form-control" name="start_date" onChange="onhange()"   onInput="checkform()"/>
                            <label class="form-label" for="form6Example1">From</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-outline">
                            <input type="date" id="end_date" class="  form-control" name="end_date"   onInput="checkform()"/>
                            <label class="form-label" for="form6Example1">To</label>
                          </div>
                        </div>
                     </div>
                     <div class="row mb-4">
                        <div class="col">
                              <textarea type="text" class="form-control datepicker" onInput="checkform()" name="reason"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                           <p id="totals_id" style="color: red;"></p>
                           <input id="submitbutton" disabled="disabled" type="submit" class="btn btn-success" name="addvissub" value="Submit Application" />
                        </div>
                    </div>
                    </div>
                    <!-- <input type="hidden" id="dateDifference" onInput="checkform()" name="daysTaken" value=""> -->
                       <h4 id="daysApplied"></h4>
                  </form>
              </div>
          
    
            </div>
	    </div>
    </div>
   <div class="row">
   	 <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            SICK LEAVE</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Taken-5</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">Balance-5</div>
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
                            MEDICAL LEAVE</div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800">Taken-5</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">Balance-5</div>
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
                            ANNUAL LEAVE</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Taken-5</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">Balance-5</div>
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
                            MATERNITY LEAVE</div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800">Taken-5</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">Balance-5</div>
                    </div>
                </div>
            </div>
        </div>
     </div>
   </div>
<div class="row">
	<div class="col-md-7">
		<div class="card">
			<div class="card-header"> <h3>LEAVE SUMMMARY</h3></div>
			<div class="card-body">
				<table class="table table-bordered" id="myleaves">
				<thead>
					<tr> 
                        <td>#</td>
						<td>LEAVE CATEGORY</td>
						<td>FROM</td>
						<td>TO</td>
                        <td>Days Taken</td>
                        <td>Approved By</td>
                        <td>Releaver</td>
                         <td>Status</td>
						<td>Edit</td>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>
			</div>
		</div>
</div>
</div>
<div class="modal fade" id="update_modal">
    <div class="modal-dialog modal-md" style="margin-top: 5%;">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title">Change Status <span id="user_id"></span> </h4> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="update-success"></div>
          <div class="modal-body"> 
            <div id="success_update" class="card"style="display:none;">
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> <div id="update_message"></div></h4>
                  </div>
             </div>
             <div id="fail_card" class="card" style="display:none;">
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> <div id="fail_message"></div></h4>
                  </div>
             </div>
              <form id="updatestatusForm">
                  <div class="form-group has-feedback">
                   <div class="form-group has-feedback">
                       <select class="form-control select2" name="leave_status" id="leave_status" required>
                            <option value="" selected disabled>Select Leave Status</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                            <option value="Pending">Pending</option>
                       </select>                
                  
                  <span class="glyphicon glyphicon-user form-control-feedback"></span><div class="user_errors"></div>
                  </div>
                     <input type="hidden"  id="update_leaveId" name="update_leaveId" >
                  <div class="row">
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Update Status</button>
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
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

<script type="text/javascript">
    function checkform() {
          var f = document.forms["checkit"].elements;
          var cansubmit = true;
          for (var i = 0; i < f.length; i++) {
            if (f[i].value.length == 0) {
              cansubmit = false;
            }
          }
          if (cansubmit) {
            document.getElementById('submitbutton').disabled = !cansubmit;
          }
        };
   ///end submit enable
      function onhange(){
        var dateOne= document.getElementById('start_date').value;
    }
    $(document).ready(function(){
        $.noConflict();
        var user_id = $('#hidden').val();
        $('#select_leave_type').change(function() {
        $('#select_leave_type  > option:selected').each(function() {
            var cat_id= $(this).val();
            var text= $( "#select_leave_type option:selected" ).text();
            $('#head').text(text);
            $.ajax({
                type:'GET',
                url:'<?php echo base_url('category-data'); ?>',
                data:{'category_valId':cat_id, 'user_id':user_id},
                dataType:'html',
                success:function(data){
                    var data1= JSON.parse(data)
                    $(".days_assigned").text(data1.cat_length);
                }
            });
        });
        
    });
// fetch leave category
 $.ajax({
         type:'GET',
         url:'<?php echo base_url('leave-category'); ?>',
         dataType:'json',
         processData:false,
      }).done( function(output){
        // console.log(output)
           if(output.code==1){
                var table_data=output.data;
                $.each(table_data, function(key, item){
                $('#select_leave_type').append("<option value='"+ item.id+"'>"+item.category_name+"</option>");
                });
          }
          if(output.code==0){
             $('#error_message').text(output.message);
             $('#error_message').show();
          }
      });
 // end fetch leave category
 updateStatus=(leaveId)=>{
         $("#update_leaveId").val(leaveId);
         jQuery('#update_modal').modal('show');
         $("#updatestatusForm").submit(function(ev){
            ev.preventDefault()
            $.ajax({
                type:"POST",
                dataType:"json",
                processData:false,
                cache:false,
                contentType:false,
                url:"<?php echo base_url('status-update')  ?>",
                data:new FormData(this),
                success:function(result)
                        {
                        if(result.code==1){
                            $("#update_message").text(result.message)
                            $("#success_update").show()
                            $("#updatestatusForm").trigger("reset")
                            setTimeout(function(){
                                window.location.reload()
                            },3500)
                        }
                        if(result.code==0){
                            $("#fail_message").text(result.error)
                            $("#fail_card").show()
                             setTimeout(function(){
                                window.location.reload()
                            },3000)
                        }
                        
                        }
             })
         })

    }
 // load employee --logged in leave summary
 function loadData(){
 $.ajax({   
     type:'GET',
     url:'<?php echo base_url('employee-summary'); ?>',
     data: {'id': user_id },
     dataType:'json',
     success:function(output){
        // console.log(output)
           
             
            var table_data=output.leaves;
            $.each(table_data, function(key, item){
            var l=item.cat_length;
            var c=item.total_days;
            var balance=l-c;
              $('#myleaves tbody').append(
                "<tr>"+
                    "<td class='cate_name'>"+item.leave_id+"</td>"+
                    "<td class='cate_name'>"+item.category_name+"</td>"+
                    "<td class='category_length'>"+item.start_date+"</td>"+
                    "<td class='category_length'>"+item.end_date+"</td>"+
                    "<td class='category_length'>"+item.duration+"</td>"+
                    "<td class='category_length'>"+item.Applied_To+"</td>"+
                    "<td class='category_length'>"+item.Releaver+"</td>"+
                    "<td class='category_length'>"+item.status+"</td>"+
                    "<td><a href='javascript:void(0);' onClick='updateStatus("+item.leave_id+")'><span class='material-icons'>edit</span></a></td>"+
                "</tr>"
                );
                 
           $('#myleaves').DataTable();
            });    
      
        
     }

  })
}
loadData();
 // end
});
    
    const now = new Date();
function isDateInFuture(date) {
     const lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0);
     return date> lastDay;
}
function getFirstDayOfMonth(year, month, date) {
  const firstDay= new Date(year, month, 1);
  return date <firstDay;
}
getDaysInMonth =function(year, month){
   return new Date(year, month, 0).getDate();
}
    
max_days=function(){
    var date1 = new Date(document.getElementById("start_date").value);
    var date2 = new Date(document.getElementById("end_date").value);
    var difference = date2 - date1;
    var days = difference/(24*3600*1000);
    return days;
}
      // apply

$('#leave_form').submit(function(event){
         event.preventDefault();
         const date = new Date();
         // var submitDisable=false;
         let button= document.getElementById("submitButton");
         // button.disabled=true;
        
         const currentYear = date.getFullYear();
         const currentMonth = date.getMonth() + 1;
         const days_of_month= getDaysInMonth(currentYear, currentMonth)
        
         var date1 = new Date(document.getElementById("start_date").value);
         var date2 = new Date(document.getElementById("end_date").value);
         var confirm_outside_current_month_date=isDateInFuture(date2)
        const firstDayCurrentMonth = getFirstDayOfMonth(date.getFullYear(), date.getMonth(),date1 );
         var selected_days_range= max_days()
            $.ajax({
                 type:'POST',
                 url:'<?php  echo base_url('leave-apply'); ?>',
                 data:new FormData(this),
                 dataType:'json',
                 processData:false,
                 contentType:false,
                 serverSide: false,
                 cache:false,
             }).done(function(response) {
                    if(response.code==1){
                        $('#success_message').text(response.message);
                        $('#success_alert').show();
                        $("#leave_form").trigger("reset");
                         setTimeout(function(){
                            window.location.reload();
                         }, 5000);
                }
                    if(response.code==0){
                         $('#fail_message').text(response.error);
                         $('#fail_alert').show();
                    setTimeout(function() {
                         $('#fail_alert').hide(); 
                            $("#leave_form").trigger("reset");
                              window.location.reload();
                    }, 3500);
                }
             });
});
          //end
      // end

</script>
<?= $this->endSection('content') ?>