<?php

namespace App\Models;

use CodeIgniter\Model;

class EventosModel extends Model
{
    protected $table            = 'profesores';
    protected $primaryKey       = 'rfc';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['prf_num_trabajador','prf_curp','prf_ap_paterno', 'prf_ap_materno', 'prf_nombre'];



}
