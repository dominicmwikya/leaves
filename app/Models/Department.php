<?php

namespace App\Models;

use CodeIgniter\Model;

class Department extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'departments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['departName'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = ['d_name'=>['rules'=>'required', 'label'=>'Depart Name']];
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
    public function insert_department($data){
        $query= $this->db->table('departments')
               ->insert($data);
                if($query){
                return 1;
                }
                else{
                    return 0;
                }
    }
    public function existing_departments(){
        $fetch_query= $this->db->table('departments')
                    ->select('*')
                    ->get();
                    $data=$fetch_query->getResultArray();
                    if(sizeof($data) >0){
                        return $data;
                    }
                    return 0;
            }

    public function count_departments(){
        $countQuery=$this->db->table('departments')
                  ->countAll();
                  return $countQuery;
    }
}
