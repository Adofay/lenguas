<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LexModel;
use App\Models\PrestadorModel;

class LexController extends BaseController
{

    public function index()
    {
        return view("lex/lista");
    }


    public function list()
    {
        $lengua_obj = new LexModel();
        //$lenguas = $lengua_obj->findAll();
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
        "profesores"  => $profesores
    ]);
    }
 
}