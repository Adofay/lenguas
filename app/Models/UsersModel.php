<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    //protected $DBGroup          = 'tests';
    protected $table            = 'public.users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['usuario','password','name','email','active','activation_token','reset_token_expies_at'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
    //protected $deletedField  = 'deleted_at';


    public function ValidateUser($usr, $pwd)
    {
        //$db = \Config\Database::connect($this->DBGroup);
        //$sql = "SELECT id_prestador, nombre_compl, carrera, institucion, periodo, estado FROM cruds.prestador;";
        //return $db->query($sql)->getResultArray();

        $user = $this->where(['usuario'=>$usr, 'active'=>1])->first();

        //print_r($user);
        //exit();

        if($user && password_verify($pwd, $user->password))
        {
            return $user;
        }
        return null;
    }

    /*
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
    */
}
