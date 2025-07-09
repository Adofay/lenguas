<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PersonaModel;

class PersonaController extends BaseController
{
    public function index()
  {
    $data = array(
      'name' => "Adonay Balderas",
      'page' => "https://piperamos.com.mx/",
      'email' => "adonaybalderas3@gmail.com",
    );

    return view("persona/index", $data);
  }

  public function nuevo()
  {
    $persona_obj = new PersonaModel();


    $data = array(
      'nombre_compl' => "Adonay Balderas",
      'carrera' => "Ing computacion",
      'institucion' => "CCH Ote",
      'periodo' => "2025-06-03 AL 2025-12-03 X",
      'estado' => 0,
    );

    $persona_obj->insert($data);

    $persona = $persona_obj->findAll();
    echo "<pre>";
    print_r($persona);
  }
}
