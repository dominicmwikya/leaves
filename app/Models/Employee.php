<?php

namespace App\Models;

use CodeIgniter\Model;

class Employee extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['emp_name', 'emp_email','emp_type','emp_pass','emp_depart','Date_Joined','Date_Birth','Designation','emp_phone','empNO','empPassport'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules=['user_email'=>['rules'=>'required', 'label'=>"Email Address"],
                                 'user_pass'=>['rules'=>'required', 'label'=>'Login Password']];
    protected $register_rules=['email'=>['rules'=>'required', 'label'=>"Email Address"],
                                'firstName'=>['rules'=>'required', 'label'=>'First Name'],
                                'secondName'=>['rules'=>'required', 'label'=>'First Name'],
                                'DoB'=>['rules'=>'required', 'label'=>'Birth Date'],
                                'dateJoined'=>['rules'=>'required', 'label'=>'Employment Date'],
                                'dateJoined'=>['rules'=>'required', 'label'=>'Employment Date'],
                                 'password'=>['rules'=>'required|matches[retype_password]|min_length[4]']];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function confirm_email_exists($email_address)
    {
        $query= $this->db->table('employees')
                ->select('emp_email')
                ->where('emp_email',$email_address)
                ->get();
                $data= $query->getResultArray();
                if(sizeof($data) >0)
                {
                return 1;
                }
                else{
                     return 0;
                }
               
    }
  public function add_employee($data){
        $query=$this->db->table('employees')
              ->insert($data);
            if($query){
                return 1;
            }
            else{
                return 0;
            }

    }
      public function get_employees(){
        $query=$this->db->table('employees')
                    ->select('*')
                    ->get();
            $data=$query->getResultArray();
            if(sizeof($data)>0){
                return $data;
            }
            return 0;
    }
    public function edit_employee($id){
        $query1= $this->db->table('employees')
                      ->select(['id','emp_name', 'emp_email', 'emp_depart', 'emp_type'])
                      ->where('id', $id)
                      ->get();
            $edit_results= $query1->getResultArray();
            return $edit_results;
    }
    public function update_employee_details($id, $data){
        $updateQuery=$this->db->table('employees')
                     ->where('id', $id)
                     ->update($data);
          if($updateQuery==true){
            return 1;
          }
          else{
            return 0;
          }
    }
     public function user_delete($id){
        $deleteQueary=$this->db->table('employees')
                     ->where('id', $id)
                     ->delete();
            if($deleteQueary==true){
                return 1;
            }
            else{
                return 0;
            }
    }
    public function count_employees(){
        $countQuery=$this->db->table('employees')
                  ->countAll();
                  return $countQuery;
    }
}