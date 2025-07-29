<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PrestadorModel;

class PrestadorController extends BaseController
{
 
 public function index()
  {
    $data = array(
      'name' => "Adonay Balderas",
      'page' => "https://piperamos.com.mx/",
      'email' => "adonaybalderas3@gmail.com",
    );

    return view("prestador/index", $data);
  }

  public function list()
  {
    $prestador_obj = new PrestadorModel();
    $prestadores = $prestador_obj->findAll();

    return view("prestador/prestador-index", ["prestadores" => $prestadores]);
  }

  public function agregar()
  {
    $prestador_obj = new PrestadorModel();

    $nombre_compl = $this->request->getVar("nombre_compl");
    $carrera = $this->request->getVar("carrera");
    $institucion = $this->request->getVar("institucion");
    $periodo = $this->request->getVar("periodo");
    $estado = $this->request->getVar("estado");

    $data = [

      "nombre_compl" => $nombre_compl,
      "carrera" => $carrera,
      "institucion" => $institucion,
      "periodo" => $periodo,
      "estado" => $estado,

    ];

    $prestador_obj->insert($data);
    return redirect("prestador-list");
    //$prestadores = $prestador_obj->findAll();
    //echo "<pre>";
    //print_r($prestadores);
  }

  public function actualizar()
  {
    $prestador_obj = new PrestadorModel();

    $id_prestador = $this->request->getVar("id_prestador");
    $nombre_compl = $this->request->getVar("nombre_compl");
    $carrera = $this->request->getVar("carrera");
    $institucion = $this->request->getVar("institucion");
    $periodo = $this->request->getVar("periodo");
    $estado = $this->request->getVar("estado");

    $data = [

      "nombre_compl" => $nombre_compl,
      "carrera" => $carrera,
      "institucion" => $institucion,
      "periodo" => $periodo,
      "estado" => $estado,

    ];
    //print_r($data);
    //echo $id_prestador;

    $prestador_obj->update($id_prestador, $data);
    //$prestadores = $prestador_obj->findAll();
    return redirect("prestador-list");
    //echo "<pre>";
    //print_r($prestadores);
  }

  public function eliminar()
  {
    $prestador_obj = new PrestadorModel();

    $id_prestador = 4;

    $prestador_obj->delete($id_prestador);

    $prestadores = $prestador_obj->findAll();
    echo "<pre>";
    print_r($prestadores);
  }

  public function consultar()
  {
    $prestador_obj = new PrestadorModel();

    $id_prestador = 5;

    $prestador = $prestador_obj->find($id_prestador);
    echo "<pre>";
    print_r($prestador);
  }
  // Queda pendiente agregar crearc editar y borrar
  public function formadd()
  {
    //$prestador_obj = new PrestadorModel();
    // $prestadores = $prestador_obj->findAll();

    return view("prestador/prestador-add");
  }

  public function edit($id)
  {
    $prestador_obj = new PrestadorModel();
    $prestador = $prestador_obj->find($id);

    return view("prestador/prestador-edt", ["prestador" => $prestador]);
  }

  public function delete($id)
  {
    $prestador_obj = new PrestadorModel();
    $prestador_obj->delete($id);

    return redirect("prestador-list");
  }
}
