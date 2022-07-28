<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Leave;
class AdminController extends BaseController
{  
     public function __construct(){
            helper(['form', 'url', 'date', 'text', 'array']);
            $this->db = \Config\Database::connect();
            $this->validator= \Config\Services::validation();
            $this->Routes= model('Routes_Data');
            $this->leave=model('Leave');
            $this->employee=model('Employee');
            $this->category=model('Category');
            $this->department=model('Department');
            $this->userole=model('UserRole');
            $this->designation=model('Designation');
    }
    public function index()
    {
        return view('main_view');
    }
    public function cat_data(){
        $category_model= new Category();
        $data= $category_model->findAll();
        return $data;
    }
    public function admindashboard()
    {    
         $cat_results=$this->cat_data();
         $data['employeeCount']= $this->employee->count_employees();
         $data['departmentCount']=$this->department->count_departments();
         $data['CountCategory']=$this->category->count_category();
         $data['Userroles']=$this->userole->get_user_roles();
        if($cat_results==0){
            $data['code']=0;
            $data['message']="No data  Found";
        }
        else{
            $data['code']=1;
            $data['data']=$cat_results;
        }
        return view('Admin_Dashboard',$data);
    }
    public function change_status(){
        $update_status_id=$this->request->getPost('update_leaveId');
         $status['status']=$this->request->getPost('leave_status');
        $update_status_response= $this->leave->update_leave_status($update_status_id,$status);
        if($update_status_response==1){
            $response['code']=1;
            $response['message']="Leave status Updated successfully";
        }if($update_status_response=0){
             $response['code']=0;
             $response['error']="Leave Update Failed";
        }
        return json_encode($response);
    }
    public function employeeDashboard()
    {   $data['employees']=$this->employee->get_employees();
        $data['Userroles']=$this->userole->get_user_roles();
        // $data['summary']=$this->category_data();
        return view('employee_Dashboard', $data);
    }
    public function employees()
    {   
        $cat_results=$this->employee->get_employees();
        $data['Userroles']=$this->userole->get_user_roles();
        $data['departments']=$this->department->existing_departments();
        $data['designations']=$this->designation->get_designations();
        $data['data']=$cat_results;
    
        return view('employees',$data);
    }
     public function employeeLeaves()
    {   $data['employees']=$this->employee->get_employees();
        return view('leaves_Employee',$data);
    }
     public function departments()
    {   
        $departs=$this->department->existing_departments();
        if($departs==0){
            $result['message']='No Data Found';
            $result['code']=0;
        }else{
            $result['data']=$departs;
            $result['code']=1;
        }
        return view('departments', $result);
    }
    public function create_employee(){
        $rules= $this->employee->register_rules;
        $validate=$this->validate($rules);
        if(!$validate){
            $validator= \Config\Services::validation();
            $result['errors']=$validator->getErrors();
            $result['code']=0; 
        }
        else{ 
            $firstName=$this->request->getPost('firstName');
            $secondName=$this->request->getPost('secondName');
            $employee_data['emp_name']=$firstName.'  '.$secondName;
            $employee_data['emp_email']=$this->request->getPost('email');
            $employee_data['emp_type']=$this->request->getPost('user_type');
            $employee_data['Date_Joined']=$this->request->getPost('dateJoined');
            $employee_data['Date_Birth']=$this->request->getPost('DoB');
            $employee_data['emp_depart']=$this->request->getPost('Department');
            $employee_data['Designation']=$this->request->getPost('Designation');
            $employee_data['emp_pass']=md5($this->request->getPost('password'));
            $employee_data['emp_phone']=$this->request->getPost('phone');
            $employee_data['empNO']=$this->request->getPost('empNO');
                $confirm_email= $this->employee->confirm_email_exists($employee_data['emp_email']);
                if($confirm_email==0){
                    $confirm= $this->employee->add_employee($employee_data);      
                    if($confirm==1){
                        $result['message']='Employee'.' '.$employee_data['emp_name']. '  '.'created successfully';
                        $result['code']=1;
                    }
                    else{
                        $result['error']='Failed to create employee! Contact Admin!';
                        $result['code']=0;
                    }
                }
                else{
                   $result['error']='Email Already Exist! Choose different Email';
                   $result['code']=0;
                }
            }
        return json_encode($result);
    }
    public function create_user_role(){
           $role_name['Role']=$this->request->getPost("role_name");
           $result=$this->userole->add_new_role($role_name);
           if($result==1){
              $data['code']=1;
              $data['message']="User Role".$role_name['Role']."created successfully";
           }else{
              $data['code']=0;
              $data['error']="Failed to create".$role_name['Role']."! Try again later";
           }
           return json_encode($data);
    }

      public function fetch_employees(){
        $cat_results=$this->employee->get_employees();
        if($cat_results==0){
            $data['code']=0;
            $data['message']="No data  Found";
        }
        else{
            $data['code']=1;
            $data['data']=$cat_results;
        }
        return view('employees', $data);
    }
    public function emp_edit(){
        $id= $this->request->getVar('id');
        $data= $this->employee->edit_employee($id);
        return json_encode($data);
  }
  public function emp_delete(){
    $id= $this->request->getVar('id');
    $deleteResult= $this->employee->user_delete($id);
    if($deleteResult==1){
        $delete_message['code']=1;
        $delete_message['message']='Employee ID'. '  '.$id. ' '. 'was deleted successfully!';
    }
    else{
         $delete_message['code']=1;
         $delete_message['error']='Failed to delete  ID'. '  '.$id. ' '. 'Contact Admin';
    }
    return json_encode($delete_message);
  }
  public function leave_application(){
    $startOfThisMonth = date('Y-m-d',strtotime("first day of this month"));
    $lastDay=date('Y-m-d',strtotime("last day of this month"));

    $date1 = date("Y-m-d",strtotime($this->request->getPost('start_date')));
    $date2 = date("Y-m-d",strtotime($this->request->getPost('end_date')));
    $diff = abs(strtotime($date2) - strtotime($date1));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $duration = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $duration=$duration +1;

       if (($date1 >= $startOfThisMonth) && ($date2 <= $lastDay))
        {   
            if($duration <= 2){
                $leave_data['duration']=$duration;
                $leave_data['category_id']=$this->request->getPost('leave_type');
                $leave_data['start_date']=$date1;
                $leave_data['end_date']=$date2;
                $leave_data['emp_id']=$this->request->getPost('emp_id');
                $leave_data['comments']=$this->request->getPost('reason');
                $leave_data['Releaver']=$this->request->getPost('releaver');
                $leave_data['Applied_To']=$this->request->getPost('Applied_To');
                $category_duration=$this->category->category_duration($leave_data['category_id']);
                $days_consumed['data']=$this->leave->get_leave_days_consumed_by_category($leave_data['category_id'],$leave_data['emp_id']);
                
                   $days_taken= $days_consumed['data']->Total;
                   if(($days_taken==null) ||($days_taken > $category_duration)) {
                         $record=$this->leave->apply_leave($leave_data);
                         if($record==1){
                             $message['code']=1;
                             $message['message']='You successfully applied for '.$duration. 'leave days. You will be notified via email on status of your application. Leave Balance is';
                         }else{
                               $message['code']=0;
                               $message['message']='Leave application failed! Try again later!';
                         }
                   }
                   else{
                         $message['code']=0;
                         $message['error']="You have no leave days remaining";
                   }
                   return json_encode($message);
            }else{
                $message['code']=0;
                $message['error']='Maximum of two days allowed per month';
            }
        }
        else{
               $message['code']=0;
               $message['error']='previous/next month dates not allowed';
        }
        return json_encode($message);
}
     public function fetch_emp_leave_record(){
        $id= $this->request->getVar('id');
        $data['leaves']=$this->leave->fetch_employee_leave($id);  
        return json_encode($data);
    }
      public function category_data(){
        $category_id= $this->request->getVar('category_valId');
        $user_id=$this->request->getVar('user_id');
        $data=$this->leave->get_Emp_history($user_id, $category_id);
         $total_days=''; 
        return json_encode($data);
       
    }
     public function fetch_leave_categories(){
        $cat_results=$this->cat_data();
        if($cat_results==0){
            $data['code']=0;
            $data['message']="No data  Found";
        }
        else{
            $data['code']=1;
            $data['data']=$cat_results;
        }
        return json_encode($data);
    }
    //end
     public function update_employee(){
            $id=$this->request->getVar('user_edit_id');
            $data['emp_name']=$this->request->getVar('edited_name');
            $data['emp_depart']=$this->request->getVar('Department');
            $data['emp_email']=$this->request->getVar('edited_email');
            $data['emp_type']=$this->request->getVar('edited_category');
            $update_result=$this->employee->update_employee_details($id, $data);
            if($update_result==1){
                $message['code']=1;
                $message['message']='Employee ID'. '  '.$id. ' '. 'was successfully updated!';
            }
            else{
                $message['code']=0;
                $message['error']='Failed to Updated employee ID'.'  '.$id. ' '.'Contact system Admin!';
            }
            return json_encode($message);
  }
  public function create_department(){

            $rules= $this->department->validationRules;
            $validate=$this->validate($rules);
            if(!$validate){
                $validator= \Config\Services::validation();
                $result['error']=$validator->getErrors();
                $result['code']=0; 
                return json_encode($result);
            } 
            else{
                $departName['departName']=$this->request->getPost('d_name');
                $result= $this->department->insert_department($departName);
                if($result==1){
                  $response['code']=1;
                  $response['message']="Department Created successfully";
                }
                else{
                    $response['code']=2;
                    $response['error']="Error! Contact system Admin for help";
                }
               return json_encode($response);
              }
        }
   public function leave_category(){
        $category_detail['category_name']=$this->request->getPost('category');
        $category_detail['cat_length']=$this->request->getPost('leave_length');
        $category_detail['amount']=$this->request->getPost('amount');
        $result= $this->category->create_cleave_category($category_detail);
        return json_encode($category_detail);
    }
            
}
