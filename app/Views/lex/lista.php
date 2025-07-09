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
            <td><select name="modulo" class="curso" placeholder="--">
                    <?php foreach ($modulos as $modulo): ?>
                        <option value="<?= $modulo['cve_modulo'] ?>"><?= $modulo['mod_nombre'] ?></option>
                    <?php endforeach; ?>
                </select></td>
            <td><select name="grupos" class="curso" placeholder="--">
                    <?php foreach ($actividades as $actividad): ?>
                        <option value="<?= $actividad['id_grupo'] ?>"><?= $actividad['grp_clave'] ?></option>
                    <?php endforeach; ?>
                </select></td>
            <td><select name="componente" class="curso" placeholder="--">
                    <?php foreach ($componentes as $componente): ?>
                        <option value="<?= $componente['id_componente'] ?>"><?= $componente['comp_nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
    </tbody>
</table>
<a id="btnCurso" onclick="return DeshabilitarCurso()" class="btn btn-info">Guardar</a>

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
        return false; // Evita que el <a> recargue o navegue
    }
</script>

<div class="panel-heading text-danger"> bloquear el paso uno y mostrar lo que selecciono </div>

<h2>Paso 2: Horarios </h2>
<div class="panel-heading text-danger"> generar los datos segun el ID actividad </div>

<table class="table" id="tbl-lista">
    <thead>
        <tr>
            <th>Profesor</th>
            <th>Periodo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><select name="profesor" class="horario">
                <?php foreach ($profesores as $profe): ?>
                    <option value="<?= $profe['rfc'] ?>"><?= $profe['prf_ap_paterno'] . ' ' . $profe['prf_ap_materno'] . ' ' . $profe['prf_nombre'] ?></option>
                <?php endforeach; ?>
            </select></td>
            <td><select name="periodo" class="horario"> 
                <option value="value1">2026-1</option> <option value="value2" selected>2026-2</option> 
            </select> </td>
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
                <th><input type="checkbox" name="item1" value="item1" class="horario"> Lunes</th>
                <td><select name="horai_1" class="horario" class="horario">
                        <?php foreach ($horas as $horaini): ?>
                            <option value="<?= $horaini['cve_hora'] ?>"><?= $horaini['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="horafin_1" class="horario">
                        <?php foreach ($horas as $horafin): ?>
                            <option value="<?= $horafin['cve_hora'] ?>"><?= $horafin['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="espacios_1" class="horario">
                        <?php foreach ($espacios as $espacio): ?>
                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th><input type="checkbox" name="item2" value="item2" class="horario"> Martes</th>
                <td><select name="horai_2" class="horario">
                        <?php foreach ($horas as $horaini): ?>
                            <option value="<?= $horaini['cve_hora'] ?>"><?= $horaini['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="horafin_2" class="horario">
                        <?php foreach ($horas as $horafin): ?>
                            <option value="<?= $horafin['cve_hora'] ?>"><?= $horafin['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="espacios_2" class="horario">
                        <?php foreach ($espacios as $espacio): ?>
                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th><input type="checkbox" name="item3" value="item3" class="horario"> Miercoles</th>
                <td><select name="horai_3" class="horario">
                        <?php foreach ($horas as $horaini): ?>
                            <option value="<?= $horaini['cve_hora'] ?>"><?= $horaini['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="horafin_3" class="horario">
                        <?php foreach ($horas as $horafin): ?>
                            <option value="<?= $horafin['cve_hora'] ?>"><?= $horafin['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="espacios_3" class="horario">
                        <?php foreach ($espacios as $espacio): ?>
                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th><input type="checkbox" name="item4" value="item4" class="horario"> Jueves</th>
                <td><select name="horai_4" class="horario">
                        <?php foreach ($horas as $horaini): ?>
                            <option value="<?= $horaini['cve_hora'] ?>"><?= $horaini['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="horafin_4" class="horario">
                        <?php foreach ($horas as $horafin): ?>
                            <option value="<?= $horafin['cve_hora'] ?>"><?= $horafin['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="espacios_4" class="horario">
                        <?php foreach ($espacios as $espacio): ?>
                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th><input type="checkbox" name="item5" value="item5" class="horario"> Viernes</th>
                <td><select name="horai_5" class="horario">
                        <?php foreach ($horas as $horaini): ?>
                            <option value="<?= $horaini['cve_hora'] ?>"><?= $horaini['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="horafin_5" class="horario">
                        <?php foreach ($horas as $horafin): ?>
                            <option value="<?= $horafin['cve_hora'] ?>"><?= $horafin['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="espacios_5" class="horario">
                        <?php foreach ($espacios as $espacio): ?>
                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th><input type="checkbox" name="item6" value="item6" class="horario"> Sabado</th>
                <td><select name="horai_6" class="horario">
                        <?php foreach ($horas as $horaini): ?>
                            <option value="<?= $horaini['cve_hora'] ?>"><?= $horaini['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="horafin_6" class="horario">
                        <?php foreach ($horas as $horafin): ?>
                            <option value="<?= $horafin['cve_hora'] ?>"><?= $horafin['hora'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
                <td><select name="espacios_6" class="horario">
                        <?php foreach ($espacios as $espacio): ?>
                            <option value="<?= $espacio['id_espacio'] ?>"><?= $espacio['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
        </tbody>
    </table>
    <div class="panel-heading text-danger">
        agregar las opciones de periodos
    </div>

    <a id="btnHorario" onclick="return DeshabilitarHorario()" class="btn btn-info">Guardar horarios</a>
    <button id="btnCrearResumen" class="btn btn-info" type="button">Crear tabla resumen</button>
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
</div>

<!-- Contenedor donde se insertará la tabla resumen -->
<div id="resumenTabla" class="mt-4"></div>

<script>
document.getElementById('btnCrearResumen').addEventListener('click', function() {
    // Paso 1: obtener selecciones
    const moduloSelect = document.querySelector('select[name="modulo"]');
    const grupoSelect = document.querySelector('select[name="grupos"]');
    const componenteSelect = document.querySelector('select[name="componente"]');

    // Paso 2: profesor y periodo
    const profesorSelect = document.querySelector('select[name="profesor"]');
    const periodoSelect = document.querySelector('select[name="periodo"]'); 

    // Días y horarios
    const diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

    // Construir la tabla resumen paso 1 y 2
    let resumenHTML = `
        <h3>Resumen Selección</h3>
        <table class="table table-bordered">
            <tr><th>Módulo</th><td>${moduloSelect.options[moduloSelect.selectedIndex].text}</td></tr>
            <tr><th>Grupo</th><td>${grupoSelect.options[grupoSelect.selectedIndex].text}</td></tr>
            <tr><th>Componente</th><td>${componenteSelect.options[componenteSelect.selectedIndex].text}</td></tr>
            <tr><th>Profesor</th><td>${profesorSelect.options[profesorSelect.selectedIndex].text}</td></tr>
            <tr><th>Periodo</th><td>${periodoSelect.options[periodoSelect.selectedIndex].text}</td></tr>`;
    
    resumenHTML += `</table>`;

    // Horarios seleccionados (solo los días con checkbox marcado)
    resumenHTML += `
        <h4>Horarios Seleccionados</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Hora inicio</th>
                    <th>Hora término</th>
                    <th>Espacio</th>
                </tr>
            </thead>
            <tbody>`;

    for(let i=1; i<=6; i++) {
        const checkbox = document.querySelector(`input[name="item${i}"]`);
        if(checkbox && checkbox.checked) {
            const horai = document.querySelector(`select[name="horai_${i}"]`);
            const horafin = document.querySelector(`select[name="horafin_${i}"]`);
            const espacio = document.querySelector(`select[name="espacios_${i}"]`);

            resumenHTML += `
                <tr>
                    <td>${diasSemana[i-1]}</td>
                    <td>${horai.options[horai.selectedIndex].text}</td>
                    <td>${horafin.options[horafin.selectedIndex].text}</td>
                    <td>${espacio.options[espacio.selectedIndex].text}</td>
                </tr>`;
        }
    }

    resumenHTML += `
            </tbody>
        </table>`;

    // Mostrar tabla resumen en el div
    document.getElementById('resumenTabla').innerHTML = resumenHTML;

});
</script>

<a id="btnSalir" class="btn btn-info">Salir</a>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
    $(function() {

        $("#tbl-prestadores-list").DataTable()
    });
</script>

<?= $this->endSection() ?>
