<?php

namespace App\Models;

use CodeIgniter\Model;

class EventosModel extends Model
{
    protected $table            = 'eventos';
    protected $primaryKey       = 'id_evento';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_actividad', 'id_espacio', 'dia', 'h_inicio', 'h_termino', 'fecha_inicio', 'fecha_termino', 'fecha_carga'];

    public function insertarfc($rfc, $id_evento)
    {
        $sql = "INSERT INTO profesores_eventos (id_evento,rfc) VALUES (" . $id_evento . ",'" . $rfc . "')";
        echo $sql;
        return $this->query($sql);
    }

    public function getreporte()
    {

        $db = \Config\Database::connect($this->DBGroup);
        $sql =

            "SELECT 
                t1.id_grupo, t1.id_actividad,
                c1.nomdia, t2.h_inicio, t2.h_termino, t2.fecha_inicio, t2.fecha_termino, t2.id_evento,
                t3.nombre as espacio, 
                t4.mod_nombre, 
                t5.grp_clave,    
                t7.comp_nombre, 
                t8.nombre AS periodo, 
                t10.prf_ap_paterno, t10.prf_ap_materno, t10.prf_nombre
            FROM 
                actividades t1
                LEFT JOIN eventos t2 USING (id_actividad)
                LEFT JOIN espacios t3 USING (id_espacio)
                JOIN modulos t4 USING (cve_modulo, id_area)
                LEFT JOIN grupos t5 USING (id_grupo, id_area)
                JOIN areas t6 USING (id_area)
                JOIN componentes t7 USING (id_componente, id_area)
                JOIN periodos t8 USING (id_periodo, tipo)
                LEFT JOIN profesores_eventos t9 USING (id_evento)
                LEFT JOIN profesores t10 USING (rfc)
                LEFT JOIN dias c1 USING (dia) 
            where t1.id_area = 69 and t8.id_periodo = 20261 and t8.tipo = 'SEM'";

        return $db->query($sql)->getResultArray();
        
    }

    public function getEvento($id_evento)
    {

        $evento = $this->where(['id_evento'=>$id_evento])->first();
        return $evento;
    }

    public function getEventos($id_actividad)
    {

        $eventos = $this->where(['id_actividad'=>$id_actividad])->findAll();
        return $eventos;
    }
}
