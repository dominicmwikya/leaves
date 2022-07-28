<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRole extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'userroles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Role'];

    // Dates
    protected $useTimestamps = true;
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
    public function add_new_role($rolename){
        $query= $this->db->table('userroles')
                      ->insert($rolename);
                      if($query){
                        return 1;
                      }
                      return 0;
    }
    public function get_user_roles(){
        $roleQuery=$this->db->table('userroles')
                   ->select('*')
                   ->get();
                   $query=$roleQuery->getResultArray();
        return $query;
    }
}
