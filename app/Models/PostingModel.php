<?php

namespace App\Models;

use CodeIgniter\Model;

class PostingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'posting';
    protected $primaryKey       = 'id_posting';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'description', 'post_type', 'user'];

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

    public function getAll(){
        return $this->db->table('posting')
        ->join('users','users.id=posting.user')
        ->join('post_type','post_type.id_post_type=posting.post_type')
        ->get()->getResultArray();
    }
    public function getFirst($id_posting){
        return $this->db->table('posting')
        ->join('users','users.id=posting.user')
        ->join('post_type','post_type.id_post_type=posting.post_type')
        ->where('posting.id_posting', $id_posting)
        ->get()->getRowArray();
    }
}
