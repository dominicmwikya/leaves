<?php

namespace App\Models;

use CodeIgniter\Model;

class Designation extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'designations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['designation_name','id'];

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
    public function create_designations($data){
        $query= $this->db->table('designations')
               ->insert($data);
                if($query){
                return 1;
                }
                else{
                    return 0;
                }
    }
    public function get_designations(){
        $fetch_query= $this->db->table('designations')
                    ->select('*')
                    ->get();
                    $data=$fetch_query->getResultArray();
                    if(sizeof($data) >0){
                        return $data;
                    }
                    return 0;
            }

    public function count_designations(){
        $countQuery=$this->db->table('designations')
                  ->countAll();
                  return $countQuery;
    }
}
