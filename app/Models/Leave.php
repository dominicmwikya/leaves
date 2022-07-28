<?php

namespace App\Models;

use CodeIgniter\Model;

class Leave extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'applications';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['category_id', 'duration', 'start_date', 'end_date','comments','emp_id','emp_name','status','Applied_To', 'Releaver','reason'];
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
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

     public function apply_leave($data){
            $query= $this->db->table('applications')
                ->insert($data);
                if($query){
                return 1;
                }
                return 0;
    }
    public function get_Emp_history($user_id, $category_id){
        $query= $this->db->table('applications')
                    ->select('*, SUM(duration) as total_days')
                    ->where('emp_id',$user_id)
                    ->where('category_id',$category_id)
                    ->join('category','category.id=applications.category_id')
                    ->get();
                    $result= $query->getResultArray();
                    if(sizeof($result) >0){
                    return $result;
                    }
                    return 0;
    }
    public function fetch_employee_leave($id){
        $query= $this->db->table('applications')
                       ->select('*')
                       ->where('emp_id',$id)
                       ->join('category','category.id=applications.category_id')
                       ->orderBy('leave_id','DESC')
                       ->get();
                       $result= $query->getResultArray();
                        if(sizeof($result) >0){
                            return $result;
                        }
                        return 0;
    }
    public function get_leave_days_consumed_by_category($id,$employee_id){
        $query=$this->db->table('applications')
                    ->select('SUM(duration) as Total',false)
                    ->where('category_id',$id)
                    ->where('emp_id', $employee_id)
                    ->get();
                    $days= $query->getResult();
                    return $days[0];      
    }
    public function update_leave_status($update_id,$status){
        $query= $this->db->table('applications')
                ->where('leave_id',$update_id)
                ->update($status);
                if($query==true){
                    return 1;
                  }
                  else{
                    return 0;
                  }

            }
        public function count_departments(){
               $countQuery=$this->db->table('departments')
                  ->countAll();
                  return $countQuery;
    }

}