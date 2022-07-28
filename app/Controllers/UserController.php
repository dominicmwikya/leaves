<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee;
class UserController extends BaseController
{
      public function __construct(){
            helper(['form', 'url', 'date', 'text', 'array']);
            $this->db = \Config\Database::connect();
            $this->validator= \Config\Services::validation();
             $this->user=model('Employee');
            $session = \Config\Services::session();
    }
    public function login() {   
        $session = \Config\Services::session();
        $data['message'] = $session->getFlashdata('message');
        echo view('user_login',$data);
    }
    public function login_user(){
        $login_rules= $this->user->validationRules;
        $validate_login= $this->validate($login_rules);
        if(!$validate_login){
               $this->login();
        }
        else{
            $session=session();
            $login_data['email'] =$this->request->getPost('user_email');
            $password = md5($this->request->getVar('user_pass'));

            $user_model= new Employee();
            $user=  $user_model->where('emp_email', $login_data['email'])->first();
            if($user){
                // $password= password_verify($password, $user['emp_pass']);
                if($password==$user['emp_pass']){
                    $session_data['email']=$user['emp_email'];
                    $session_data['role']=$user['emp_type'];
                    $session_data['name']=$user['emp_name'];
                    $session_data['id']=$user['id'];
                    $session_data['logged_in']=TRUE;
                    $session->set($session_data);
                    if(( $session->get('role')=='Admin') ||($session->get('role')=='Manager')){
                       $session->setFlashdata('message','Welcome'. $session_data['name']);
                       return redirect()->to(base_url('/'));
                    }
                    if($session->get('role')=='General'){
                        return redirect()->to(base_url('/employee'));
                    }

                  else{
                      $session->setFlashdata('message','Not Allowed');
                      return redirect()->to(base_url('user/logout'));
                  }
            }
           // print_r($user); exit();
            $session->setFlashdata('message','Incorret login details.');
            return redirect()->to(base_url('login'));
         }
        $session->setFlashdata('message','User not found!.');
        return redirect()->to(base_url('login'));
       }
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}
