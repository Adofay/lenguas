<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActividadModel;
use App\Models\EventosModel;

class LexController extends BaseController
{

    public function index()
    {
        return view("lex/lista");
    }


    public function list()
    {
        $lengua_obj = new ActividadModel();
        $eventos_obj = new EventosModel();
        $datos = $eventos_obj->getreporte();
        $lenguas = $lengua_obj->getgrupos();
        $comps = $lengua_obj->getcomponentes();
        $mods = $lengua_obj->getmodulos();
        $horas = $lengua_obj->gethoras();
        $espacios = $lengua_obj->getespacios();
        $profesores = $lengua_obj->getprofe();

        return view("lex/lista", [
            "actividades" => $lenguas,
            "componentes" => $comps,
            "modulos"     => $mods,
            "horas"       => $horas,
            "espacios"    => $espacios,
            "profesores"  => $profesores,
            "datos"        => $datos
        ]);
    }

    public function agregaract()
    {
        $actividad_obj = new ActividadModel();

        $cve_modulo = $this->request->getVar("cve_modulo");
        $id_area = $this->request->getVar("id_area");
        $id_grupo = $this->request->getVar("id_grupo");
        $id_componente = $this->request->getVar("id_componente");
        $id_periodo = $this->request->getVar("id_periodo");
        $tipo = $this->request->getVar("tipo");

        $data = [

            "cve_modulo" => $cve_modulo,
            "id_area" => $id_area,
            "id_grupo" => $id_grupo,
            "id_componente" => $id_componente,
            "id_periodo" => $id_periodo,
            "tipo" => $tipo,

        ];
        //print_r($data);
        //exit();
        $actividad_obj->insert($data);


        $id_actividad = $actividad_obj->getInsertID();

        return redirect()->to(base_url("lenguas2/" . $id_actividad));
        //$prestadores = $prestador_obj->findAll();
        //echo "<pre>";
        //print_r($prestadores);
    }

    public function list2($id_actividad)
    {
        $lengua_obj = new ActividadModel();
        $eventos_obj = new EventosModel();
        $datos = $eventos_obj->getreporte();
        $lenguas = $lengua_obj->getgrupos();
        $comps = $lengua_obj->getcomponentes();
        $mods = $lengua_obj->getmodulos();
        $horas = $lengua_obj->gethoras();
        $espacios = $lengua_obj->getespacios();
        $profesores = $lengua_obj->getprofe();

        return view("lex/lista", [
            "actividades"   => $lenguas,
            "componentes"   => $comps,
            "modulos"       => $mods,
            "horas"         => $horas,
            "espacios"      => $espacios,
            "profesores"    => $profesores,
            "id_actividad"  => $id_actividad,
            "datos"        => $datos
        ]);
    }
    public function agregarevent()
    {
        $eventos_obj = new EventosModel();

        $id_actividad = $this->request->getVar("id_actividad");
        $rfc = $this->request->getVar("rfc");
        //insertar lunes
        $id_espacio_1 = $this->request->getVar("id_espacio_1");
        $dia_1 = $this->request->getVar("dia_1");
        $h_inicio_1 = $this->request->getVar("h_inicio_1");
        $h_termino_1 = $this->request->getVar("h_termino_1");
        $fecha_inicio = $this->request->getVar("fecha_inicio");
        $fecha_termino = $this->request->getVar("fecha_termino");

        if ($dia_1 == 1) {

            $data_1 = [

                "id_actividad"    => $id_actividad,
                "id_espacio"      => $id_espacio_1,
                "dia"             => $dia_1,
                "h_inicio"        => $h_inicio_1,
                "h_termino"       => $h_termino_1,
                "fecha_inicio"    => $fecha_inicio,
                "fecha_termino"   => $fecha_termino,
                "fecha_carga"     => date("Y-m-d"),

            ];

            $eventos_obj->insert($data_1);
            $id_evento = $eventos_obj->getInsertID();
            //crear metodo que inserte en la tabla profesores eventos 
            $eventos_obj->insertarfc($rfc, $id_evento);
        }
        //martes
        $post = $this->request->getPost(['id_espacio_2', 'dia_2', 'h_inicio_2', 'h_termino_2']);
        if ($post['dia_2'] == 2) {
            $data_2 = array(

                "id_actividad"    => $id_actividad,
                "id_espacio"    => $post['id_espacio_2'],
                "dia"           => $post['dia_2'],
                "h_inicio"      => $post['h_inicio_2'],
                "h_termino"     => $post['h_termino_2'],
                "fecha_inicio"    => $fecha_inicio,
                "fecha_termino"   => $fecha_termino,
                "fecha_carga"     => date("Y-m-d")

            );
            $eventos_obj->insert($data_2);
            $id_evento = $eventos_obj->getInsertID();
            $eventos_obj->insertarfc($rfc, $id_evento);
        }
        //miercoles
        $post = $this->request->getPost(['id_espacio_3', 'dia_3', 'h_inicio_3', 'h_termino_3']);
        if ($post['dia_3'] == 3) {
            $data_3 = array(

                "id_actividad"    => $id_actividad,
                "id_espacio"    => $post['id_espacio_3'],
                "dia"           => $post['dia_3'],
                "h_inicio"      => $post['h_inicio_3'],
                "h_termino"     => $post['h_termino_3'],
                "fecha_inicio"    => $fecha_inicio,
                "fecha_termino"   => $fecha_termino,
                "fecha_carga"     => date("Y-m-d")

            );
            $eventos_obj->insert($data_3);
            $id_evento = $eventos_obj->getInsertID();
            $eventos_obj->insertarfc($rfc, $id_evento);
        }
        //jueves
        $post = $this->request->getPost(['id_espacio_4', 'dia_4', 'h_inicio_4', 'h_termino_4']);
        if ($post['dia_4'] == 4) {
            $data_4 = array(

                "id_actividad"    => $id_actividad,
                "id_espacio"    => $post['id_espacio_4'],
                "dia"           => $post['dia_4'],
                "h_inicio"      => $post['h_inicio_4'],
                "h_termino"     => $post['h_termino_4'],
                "fecha_inicio"    => $fecha_inicio,
                "fecha_termino"   => $fecha_termino,
                "fecha_carga"     => date("Y-m-d")

            );
            $eventos_obj->insert($data_4);
            $id_evento = $eventos_obj->getInsertID();
            $eventos_obj->insertarfc($rfc, $id_evento);
        }
        //viernes
        $post = $this->request->getPost(['id_espacio_5', 'dia_5', 'h_inicio_5', 'h_termino_5']);
        if ($post['dia_5'] == 5) {
            $data_5 = array(

                "id_actividad"    => $id_actividad,
                "id_espacio"    => $post['id_espacio_5'],
                "dia"           => $post['dia_5'],
                "h_inicio"      => $post['h_inicio_5'],
                "h_termino"     => $post['h_termino_5'],
                "fecha_inicio"    => $fecha_inicio,
                "fecha_termino"   => $fecha_termino,
                "fecha_carga"     => date("Y-m-d")

            );
            $eventos_obj->insert($data_5);
            $id_evento = $eventos_obj->getInsertID();
            $eventos_obj->insertarfc($rfc, $id_evento);
        }
        //sabado
        $post = $this->request->getPost(['id_espacio_6', 'dia_6', 'h_inicio_6', 'h_termino_6']);
        if ($post['dia_6'] == 6) {
            $data_6 = array(

                "id_actividad"    => $id_actividad,
                "id_espacio"    => $post['id_espacio_6'],
                "dia"           => $post['dia_6'],
                "h_inicio"      => $post['h_inicio_6'],
                "h_termino"     => $post['h_termino_6'],
                "fecha_inicio"    => $fecha_inicio,
                "fecha_termino"   => $fecha_termino,
                "fecha_carga"     => date("Y-m-d")

            );
            $eventos_obj->insert($data_6);
            $id_evento = $eventos_obj->getInsertID();
            $eventos_obj->insertarfc($rfc, $id_evento);
        }
        //print_r($data_1);
        //exit();
        //$id_actividad = $eventos_obj->getInsertID();

        return redirect()->to(base_url("lenguas2/" . $id_actividad));
        //$prestadores = $prestador_obj->findAll();
        //echo "<pre>";
        //print_r($prestadores);
    }

    public function editar($id_evento, $id_actividad)
    {
        $evento_obj = new EventosModel();
        $evento = $evento_obj->getEvento($id_evento);
        $eventos = $evento_obj->getEventos($id_actividad);
        $lengua_obj = new ActividadModel();
        //$eventos_obj = new EventosModel();
        $datos = $evento_obj->getreporte();
        $lenguas = $lengua_obj->getgrupos();
        $comps = $lengua_obj->getcomponentes();
        $mods = $lengua_obj->getmodulos();
        $horas = $lengua_obj->gethoras();
        $espacios = $lengua_obj->getespacios();
        $profesores = $lengua_obj->getprofe();

        return view("lex/lista", [
            "actividades"   => $lenguas,
            "componentes"   => $comps,
            "modulos"       => $mods,
            "horas"         => $horas,
            "espacios"      => $espacios,
            "profesores"    => $profesores,
            "id_actividad"  => $id_actividad,
            "datos"         => $datos,
            "evento"        => $evento,
            "eventos"       => $eventos
        ]);
    }

    public function actualizarevent()
    {
        $evento_obj = new EventosModel();
        $id_evento_1 = $this->request->getVar("id_evento_1");
        $id_espacio_1 = $this->request->getVar("id_espacio_1");
        $dia_1 = $this->request->getVar("dia_1");
        $h_inicio_1 = $this->request->getVar("h_inicio_1");
        $h_termino_1 = $this->request->getVar("h_termino_1");


        $data_1 = [
            "id_espacio"    => $id_espacio_1,
            "dia"           => $dia_1,
            "h_inicio"      => $h_inicio_1,
            "h_termino"     => $h_termino_1,
        ];

        $evento_obj->update($id_evento_1, $data_1);
    }

    public function delete($id_evento)
    {
        return view("lex/lista");
    }
}
