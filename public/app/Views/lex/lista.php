<?= $this->section("title") ?>
Lista
<?= $this->endSection() ?>
<?= $this->extend('layout/cabecera'); ?>
<?= $this->section("styles") ?>
<style>
    #frm-add-student label.error {
        color: red;
    }

    .btn-info {
        background-color: rgb(27, 124, 202);
        color: white;
        padding: 10px 15px;
        margin-bottom: 20px;
        display: inline-block;
        text-decoration: none;

    }

    .btn-edit {
        background-color: rgb(231, 165, 34);
        color: white;
        padding: 10px 15px;
        margin-bottom: 20px;
        display: inline-block;
        text-decoration: none;

    }
</style>
<?= $this->endSection() ?>

<?= $this->section("body") ?>

<?php

if (isset($validation)) {

    //print_r($validation->listErrors());
}
//print_r($actividades);
//print_r($prestadores);
?>
<h2>Paso 1: Curso con grupo </h2>
<div class="panel-heading text-danger"> guardar actividad, utilizar metodo del crud de prestador </div>

<form class="form-horizontal" id="frmadd" action="<?= base_url('actividad/agregar') ?>" method="post">
    <input hidden id="id_area" name="id_area" value="69" class="form-group">
    <input hidden id="id_periodo" name="id_periodo" value="2026-1" class="form-group">
    <input hidden id="tipo" name="tipo" value="SEM" class="form-group">
    <table class="table" id="tbl-lista">
        <thead>
            <tr>
                <th>Cursos</th>
                <th>Grupos</th>
                <th>Nivel</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><select name="cve_modulo" class="curso" placeholder="--">
                        <?php foreach ($modulos as $modulo): ?>
                            <option value="<?= $modulo['cve_modulo'] ?>"><?= $modulo['mod_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="id_grupo" class="curso" placeholder="--">
                        <?php foreach ($actividades as $actividad): ?>
                            <option value="<?= $actividad['id_grupo'] ?>"><?= $actividad['grp_clave'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="id_componente" class="curso" placeholder="--">
                        <?php foreach ($componentes as $componente): ?>
                            <option value="<?= $componente['id_componente'] ?>"><?= $componente['comp_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <a id="btnCurso" onclick="return DeshabilitarCurso()" class="btn btn-info">Guardar</a>
    <input type="submit" value="Enviar">
</form>

<script>
    function DeshabilitarCurso() {
        if (!confirm('¿Está seguro de los datos introducidos?')) {
            return false;
        }

        // Desactiva todos los <select> con clase .curso
        const selects = document.querySelectorAll('.curso');
        selects.forEach(function(select) {
            select.disabled = true;
        });

        // Oculta el botón "Guardar"
        document.getElementById('btnCurso').style.display = 'none';
        return true; // Evita que el <a> recargue o navegue
    }
</script>

<div class="panel-heading text-danger"> bloquear el paso uno y mostrar lo que selecciono </div>

<h2>Paso 2: Horarios </h2>
<?php
if (isset($id_actividad))
    echo $id_actividad;
else
    $id_actividad = 0;
?>
<div class="panel-heading text-danger"> generar los datos segun el ID actividad </div>
<?php

    $id_evento = 0;
    $fechini   = '';
    $fechfin   = '';
    $dia       = 0;
    $horini   = 0;
    $horfin   = 0;
    $id_espacio   = 0;

     $id_evento_1 = 0;
    $dia_1        = 0;
    $horini_1    = 0;
    $horfin_1    = 0;
    $id_espacio_1    = 0;

    $id_evento_2 = 0;
    $dia_2        = 0;
    $horini_2    = 0;
    $horfin_2    = 0;
    $id_espacio_2    = 0;

    $id_evento_3 = 0;
    $dia_3        = 0;
    $horini_3    = 0;
    $horfin_3    = 0;
    $id_espacio_3    = 0;

    $id_evento_4 = 0;
    $dia_4        = 0;
    $horini_4    = 0;
    $horfin_4    = 0;
    $id_espacio_4    = 0;

    $id_evento_5 = 0;
    $dia_5       = 0;
    $horini_5    = 0;
    $horfin_5    = 0;
    $id_espacio_5    = 0;

    $id_evento_6 = 0;
    $dia_6       = 0;
    $horini_6   = 0;
    $horfin_6    = 0;
    $id_espacio_6    = 0;

if (isset($evento))
echo $evento['id_evento'];
$id_evento = $evento['id_evento'];
{
    print_r($evento);
        
    $fechini   = $evento['fecha_inicio'];
    $fechfin   = $evento['fecha_termino'];
       
    $id_actividad = $evento['id_actividad'];
    print_r($eventos);

    foreach ($eventos as $evento) {
        $dia       = $evento['dia'];
        if ($dia == 1) {
            $id_evento_1 = $evento['id_evento'];
            $dia_1       = $evento['dia'];
            $horini_1   = $evento['h_inicio'];
            $horfin_1   = $evento['h_termino'];
            $id_espacio_1   = $evento['id_espacio'];
        }
        if ($dia == 2) {
            $id_evento_2 = $evento['id_evento'];
            $dia_2       = $evento['dia'];
            $horini_2   = $evento['h_inicio'];
            $horfin_2   = $evento['h_termino'];
            $id_espacio_2   = $evento['id_espacio'];
        }
        if ($dia == 3) {
            $id_evento_3 = $evento['id_evento'];
            $dia_3       = $evento['dia'];
            $horini_3   = $evento['h_inicio'];
            $horfin_3   = $evento['h_termino'];
            $id_espacio_3   = $evento['id_espacio'];
        }
        if ($dia == 4) {
            $id_evento_4 = $evento['id_evento'];
            $dia_4       = $evento['dia'];
            $horini_4   = $evento['h_inicio'];
            $horfin_4   = $evento['h_termino'];
            $id_espacio_4   = $evento['id_espacio'];
        }
        if ($dia == 5) {
            $id_evento_5 = $evento['id_evento'];
            $dia_5       = $evento['dia'];
            $horini_5   = $evento['h_inicio'];
            $horfin_5   = $evento['h_termino'];
            $id_espacio_5   = $evento['id_espacio'];
        }
        if ($dia == 6) {
            $id_evento_6 = $evento['id_evento'];
            $dia_6       = $evento['dia'];
            $horini_6   = $evento['h_inicio'];
            $horfin_6   = $evento['h_termino'];
            $id_espacio_6   = $evento['id_espacio'];
        }
    }
}
?>
<?php if($id_evento == 0){?>
	<form class="form-horizontal" id="frmevento" action="<?= base_url('eventos/agregar') ?>" method="post">
<?php } ?>
<?php if($id_evento > 0){?>
	<form class="form-horizontal" id="frmevento" action="<?= base_url('eventos/actualizar') ?>" method="post">
<?php } ?>

    <input hidden id="id_actividad" name="id_actividad" value="<?php echo $id_actividad; ?>" class="form-group">

    <table class="table" id="tbl-lista">
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Fecha inicio</th>
                <th>Fecha termino</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><select name="rfc" class="horario">
                        <?php foreach ($profesores as $profe): ?>
                            <option value="<?= $profe['rfc'] ?>"><?= $profe['prf_ap_paterno'] . ' ' . $profe['prf_ap_materno'] . ' ' . $profe['prf_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?= $fechini ?>" class="form-group">
                </td>
                <td>
                    <input type="date" id="fecha_termino" name="fecha_termino" value="<?= $fechfin ?>" class="form-group">
                </td>
            </tr>
        </tbody>
    </table>

    <div class="panel-body">
        <table class="table" id="tbl-lista">
            <thead>
                <tr>
                    <th>Dias</th>
                    <th>Hora de inicio</th>
                    <th>Hora de termino</th>
                    <th>Espacio</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th>
                        <input hidden id="id_evento_1" name="id_evento_1" value="<?php echo $id_evento_1; ?>" class="form-group">
                        <input type="checkbox" name="dia_1" value="1" class="horario" <?php if ($dia_1 == 1) echo 'checked'; ?>>Lunes</th>
                    <td><select name="h_inicio_1" class="horario">
                            <?php foreach ($horas as $horaini):
                                echo $horini; ?>
                                <option value="<?= $horaini['hora'] ?>" <?php if ($horaini['hora'] == $horini_1) echo 'selected'; ?>><?= $horaini['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="h_termino_1" class="horario">
                            <?php foreach ($horas as $horafin):
                                echo $horfin; ?>
                                <option value="<?= $horafin['hora'] ?>" <?php if ($horafin['hora'] == $horfin_1) echo 'selected'; ?>><?= $horafin['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="id_espacio_1" class="horario">
                            <?php foreach ($espacios as $espacio):
                                echo $id_espacio; ?>
                                <option value="<?= $espacio['nombre'] ?>" <?php if ($espacio['id_espacio'] == $id_espacio_1) echo 'selected'; ?>><?= $espacio['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>
                        <input hidden id="id_evento_2" name="id_evento_2" value="<?php echo $id_evento_2; ?>" class="form-group">
                        <input type="checkbox" name="dia_2" value="2" class="horario" <?php if ($dia_2 == 2) echo 'checked'; ?>>Martes</th>
                    <td><select name="h_inicio_2" class="horario">
                            <?php foreach ($horas as $horaini): ?>
                                <option value="<?= $horaini['hora'] ?>" <?php if ($horaini['hora'] == $horini_2) echo 'selected'; ?>><?= $horaini['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="h_termino_2" class="horario">
                            <?php foreach ($horas as $horafin): ?>
                                <option value="<?= $horafin['hora'] ?>" <?php if ($horafin['hora'] == $horfin_2) echo 'selected'; ?>><?= $horafin['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="id_espacio_2" class="horario">
                            <?php foreach ($espacios as $espacio): ?>
                                <option value="<?= $espacio['nombre'] ?>" <?php if ($espacio['id_espacio'] == $id_espacio_2) echo 'selected'; ?>><?= $espacio['nombre'] ?>"</option>
                            <?php endforeach; ?>
                        </select></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>
                        <input hidden id="id_evento_3" name="id_evento_3" value="<?php echo $id_evento_3; ?>" class="form-group">
                        <input type="checkbox" name="dia_3" value="3" class="horario" <?php if ($dia_3 == 3) echo 'checked'; ?>>Miercoles</th>
                    <td><select name="h_inicio_3" class="horario">
                            <?php foreach ($horas as $horaini): ?>
                                <option value="<?= $horaini['hora'] ?>" <?php if ($horaini['hora'] == $horini_3) echo 'selected'; ?>><?= $horaini['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="h_termino_3" class="horario">
                            <?php foreach ($horas as $horafin): ?>
                                <option value="<?= $horafin['hora'] ?>" <?php if ($horafin['hora'] == $horfin_3) echo 'selected'; ?>><?= $horafin['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="id_espacio_3" class="horario">
                            <?php foreach ($espacios as $espacio): ?>
                                <option value="<?= $espacio['nombre'] ?>" <?php if ($espacio['id_espacio'] == $id_espacio_3) echo 'selected'; ?>><?= $espacio['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>
                        <input hidden id="id_evento_4" name="id_evento_4" value="<?php echo $id_evento_4; ?>" class="form-group">
                        <input type="checkbox" name="dia_4" value="4" class="horario" <?php if ($dia_4 == 4) echo 'checked'; ?>>Jueves</th>
                    <td><select name="h_inicio_4" class="horario">
                            <?php foreach ($horas as $horaini): ?>
                                <option value="<?= $horaini['hora'] ?>" <?php if ($horaini['hora'] == $horini_4) echo 'selected'; ?>><?= $horaini['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="h_termino_4" class="horario">
                            <?php foreach ($horas as $horafin): ?>
                                <option value="<?= $horafin['hora'] ?>" <?php if ($horafin['hora'] == $horfin_4) echo 'selected'; ?>><?= $horafin['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="id_espacio_4" class="horario">
                            <?php foreach ($espacios as $espacio): ?>
                                <option value="<?= $espacio['nombre'] ?>" <?php if ($espacio['id_espacio'] == $id_espacio_4) echo 'selected'; ?>><?= $espacio['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>
                        <input hidden id="id_evento_5" name="id_evento_5" value="<?php echo $id_evento_5; ?>" class="form-group">
                        <input type="checkbox" name="dia_5" value="5" class="horario" <?php if ($dia_5 == 5) echo 'checked'; ?>>Viernes</th>
                    <td><select name="h_inicio_5" class="horario">
                            <?php foreach ($horas as $horaini): ?>
                                <option value="<?= $horaini['hora'] ?>" <?php if ($horaini['hora'] == $horini_5) echo 'selected'; ?>><?= $horaini['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="h_termino_5" class="horario">
                            <?php foreach ($horas as $horafin): ?>
                                <option value="<?= $horafin['hora'] ?>" <?php if ($horafin['hora'] == $horfin_5) echo 'selected'; ?>><?= $horafin['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="id_espacio_5" class="horario">
                            <?php foreach ($espacios as $espacio): ?>
                                <option value="<?= $espacio['nombre'] ?>" <?php if ($espacio['id_espacio'] == $id_espacio_5) echo 'selected'; ?>><?= $espacio['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>
                        <input hidden id="id_evento_6" name="id_evento_6" value="<?php echo $id_evento_6; ?>" class="form-group">
                        <input type="checkbox" name="dia_6" value="6" class="horario" <?php if ($dia_6 == 6) echo 'checked'; ?>>Sabado</th>
                    <td><select name="h_inicio_6" class="horario">
                            <?php foreach ($horas as $horaini): ?>
                                <option value="<?= $horaini['hora'] ?>" <?php if ($horaini['hora'] == $horini_6) echo 'selected'; ?>><?= $horaini['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="h_termino_6" class="horario">
                            <?php foreach ($horas as $horafin): ?>
                                <option value="<?= $horafin['hora'] ?>" <?php if ($horafin['hora'] == $horfin_6) echo 'selected'; ?>><?= $horafin['hora'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select name="id_espacio_6" class="horario">
                            <?php foreach ($espacios as $espacio): ?>
                                <option value="<?= $espacio['nombre'] ?>" <?php if ($espacio['id_espacio'] == $id_espacio_6) echo 'selected'; ?>><?= $espacio['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select></td>
                </tr>
            </tbody>
        </table>


        <div class="panel-heading text-danger">
            agregar las opciones de periodos
        </div>

        <input class="btn btn-info" type="submit" value="Guardar y actualizar">
        <button id="btnCrearResumen" onclick="return DeshabilitarHorario()" class="btn btn-info" type="button">Crear tabla resumen</button>

        <script>
            function DeshabilitarHorario() {
                if (!confirm('¿Está seguro de los datos introducidos?')) {
                    return false;
                }
                // Desactiva todos los <select> con clase .horario
                const selects = document.querySelectorAll('.horario');
                selects.forEach(function(select) {
                    select.disabled = true;
                });
                // Oculta el botón "Guardar"
                document.getElementById('btnHorario').style.display = 'none';
                return false; // Evita que el <a> recargue o navegue
            }
        </script>

        <h1>Reporte</h1>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>id_actividad</th>
                    <th>id_evento</th>
                    <th>#Horario</th>
                    <th>#Periodo</th>
                    <th>#Curso</th>
                    <th>#profesor</th>
                    <th>#editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($datos) > 0) {
                    foreach ($datos as $dato) {
                ?>
                        <tr>
                            <td><?= $dato['id_actividad'] ?></td>
                            <td><?= $dato['id_evento'] ?></td>
                            <td><?= $dato['nomdia'] . " " . $dato['h_inicio'] . " " . $dato['h_termino'] . " " . $dato['espacio'] ?></td>
                            <td><?= $dato['periodo'] . " " . $dato['fecha_inicio'] .  " " . $dato['fecha_termino'] ?></td>
                            <td><?= $dato['mod_nombre'] . " " . $dato['grp_clave'] . " " . $dato['comp_nombre'] ?></td>
                            <td><?= $dato['prf_ap_paterno'] . " " . $dato['prf_ap_materno'] . " " . $dato['prf_nombre'] ?></td>
                            <td><button type="button" class="btn btn-edit" data-toggle="modal" data-target="#exampleModal">Editar</button>
                                <a href="<?= base_url('eventos/editar/' . $dato['id_evento'] . '/' . $dato['id_actividad'])  ?>" button class="btn btn-info">Editar</button a>
                                    <a href="<?= base_url('eventos/delete/' . $dato['id_evento'] . '')  ?>"
                                        onclick="if(! confirm('Are you sure want to delete?')) return false;"
                                        button class="btn btn-danger">Delete</button a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
                </tfoot>
        </table>

</form>
</div>

<a id="btnSalir" class="btn btn-info">Salir</a>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <table class="table" id="tbl-lista">
                        <thead>
                            <tr>
                                <th>Dias</th>
                                <th>Hora de inicio</th>
                                <th>Hora de termino</th>
                                <th>Espacio</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>

                                <th><input type="checkbox" name="dia_1" value="1" class="horario">Lunes</th>
                                <td><select name="h_inicio_1" class="horario">
                                        <?php foreach ($horas as $horaini): ?>
                                            <option value="<?= $horaini['hora'] ?>"><?= $horaini['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="h_termino_1" class="horario">
                                        <?php foreach ($horas as $horafin): ?>
                                            <option value="<?= $horafin['hora'] ?>"><?= $horafin['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="id_espacio_1" class="horario">
                                        <?php foreach ($espacios as $espacio): ?>
                                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <th><input type="checkbox" name="dia_2" value="2" class="horario">Martes</th>
                                <td><select name="h_inicio_2" class="horario">
                                        <?php foreach ($horas as $horaini): ?>
                                            <option value="<?= $horaini['hora'] ?>"><?= $horaini['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="h_termino_2" class="horario">
                                        <?php foreach ($horas as $horafin): ?>
                                            <option value="<?= $horafin['hora'] ?>"><?= $horafin['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="id_espacio_2" class="horario">
                                        <?php foreach ($espacios as $espacio): ?>
                                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <th><input type="checkbox" name="dia_3" value="3" class="horario">Miercoles</th>
                                <td><select name="h_inicio_3" class="horario">
                                        <?php foreach ($horas as $horaini): ?>
                                            <option value="<?= $horaini['hora'] ?>"><?= $horaini['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="h_termino_3" class="horario">
                                        <?php foreach ($horas as $horafin): ?>
                                            <option value="<?= $horafin['hora'] ?>"><?= $horafin['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="id_espacio_3" class="horario">
                                        <?php foreach ($espacios as $espacio): ?>
                                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <th><input type="checkbox" name="dia_4" value="4" class="horario">Jueves</th>
                                <td><select name="h_inicio_4" class="horario">
                                        <?php foreach ($horas as $horaini): ?>
                                            <option value="<?= $horaini['hora'] ?>"><?= $horaini['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="h_termino_4" class="horario">
                                        <?php foreach ($horas as $horafin): ?>
                                            <option value="<?= $horafin['hora'] ?>"><?= $horafin['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="id_espacio_4" class="horario">
                                        <?php foreach ($espacios as $espacio): ?>
                                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <th><input type="checkbox" name="dia_5" value="5" class="horario">Viernes</th>
                                <td><select name="h_inicio_5" class="horario">
                                        <?php foreach ($horas as $horaini): ?>
                                            <option value="<?= $horaini['hora'] ?>"><?= $horaini['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="h_termino_5" class="horario">
                                        <?php foreach ($horas as $horafin): ?>
                                            <option value="<?= $horafin['hora'] ?>"><?= $horafin['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="id_espacio_5" class="horario">
                                        <?php foreach ($espacios as $espacio): ?>
                                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <th><input type="checkbox" name="dia_6" value="6" class="horario">Sabado</th>
                                <td><select name="h_inicio_6" class="horario">
                                        <?php foreach ($horas as $horaini): ?>
                                            <option value="<?= $horaini['hora'] ?>"><?= $horaini['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="h_termino_6" class="horario">
                                        <?php foreach ($horas as $horafin): ?>
                                            <option value="<?= $horafin['hora'] ?>"><?= $horafin['hora'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td><select name="id_espacio_6" class="horario">
                                        <?php foreach ($espacios as $espacio): ?>
                                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(function() {

        $("#tbl-prestadores-list").DataTable()
    });

    document.getElementById('btnGuardarHorario').addEventListener('click', function() {
        // Aquí puedes recolectar los valores seleccionados o hacer un envío AJAX
        alert('Guardando horario...');

        // Ejemplo: cerrar el modal después de guardar
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarHorario'));
        modal.hide();
    });
</script>

<?= $this->endSection() ?>