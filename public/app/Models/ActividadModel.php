<?php

namespace App\Models;

use CodeIgniter\Model;

class ActividadModel extends Model
{
    protected $table            = 'actividades';
    protected $primaryKey       = 'id_actividad';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cve_modulo','id_grupo','id_componente', 'id_periodo', 'tipo', 'id_area'];


//metodo grupos
public function getgrupos()
    {
        $db = \Config\Database::connect($this->DBGroup);
        $sql = "SELECT id_grupo, grp_clave FROM grupos where id_area = 69;";
        return $db->query($sql)->getResultArray();
    }
//metodo componentes
public function getcomponentes()
    {
        $db = \Config\Database::connect($this->DBGroup);
        $sql = "SELECT id_componente, comp_nombre FROM componentes where id_area = 69;";
        return $db->query($sql)->getResultArray();
    }
//metodo modulos
public function getmodulos()
    {
        $db = \Config\Database::connect($this->DBGroup);
        $sql = "SELECT cve_modulo, mod_nombre FROM modulos where id_area = 69;";
        return $db->query($sql)->getResultArray();
    }
    //metodo hora de horas
public function gethoras()
    {
        $db = \Config\Database::connect($this->DBGroup);
        $sql = "SELECT cve_hora, hora, horaf FROM horas;";
        return $db->query($sql)->getResultArray();
    }

//metodo espacio
public function getespacios()
    {
        $db = \Config\Database::connect($this->DBGroup);
        $sql = "SELECT id_espacio, nombre FROM espacios where estado=1;";
        return $db->query($sql)->getResultArray();
    }

//metodo hora del profesor
public function getprofe()
    {
        $db = \Config\Database::connect($this->DBGroup);
        $sql = "SELECT rfc, prf_ap_paterno, prf_ap_materno, prf_nombre FROM profesores;";
        return $db->query($sql)->getResultArray();
    }
}
