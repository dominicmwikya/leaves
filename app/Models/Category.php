<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'category';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['category_name', 'cat_length','amount'];

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
    public function create_cleave_category($data){
        $query=$this->db->table('category')
             ->insert($data);
             if($query){
                return 1;
             }
             else{
                return 0;
             }
    }
public function count_category(){
        $countQuery=$this->db->table('category')
                  ->countAll();
                  return $countQuery;
    }
 public function get_category(){
        $query=$this->db->table('category')
             ->select('*')
             ->get();
            $data=$query->getResultArray();
             if(sizeof($data) >0){
                return $data;
             }
             else{
                return 0;
             }
    }
public function category_duration($category){
      $query=$this->db->table('category')
                      ->select(['cat_length'])
                      ->where('id',$category)
                      ->get();
                      $data[0]=$query->getResult();
                    return $data;  


}    
}
