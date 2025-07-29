<?= $this->extend('layout/app'); ?>

<?= $this->section("title") ?>
Lista
<?= $this->endSection() ?>

<?= $this->section("styles") ?>
<style>
    #frm-add-student label.error {
        color: red;
    }

    .btn-add {
        background-color: #2196F3;
        color: white;
        padding: 10px 15px;
        margin-bottom: 20px;
        display: inline-block;
        text-decoration: none;
    }

    .btn-back {
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

?>
<h1 class="text-end">Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
<a href="<?= base_url('prestador/add')  ?>" class="btn-add">Agregar Persona</a>

<div class="panel panel-primary">
    <div class="panel-heading">
        Datos prestador
        <a href="<?= base_url('prestador-list') ?>" style="margin-top: -7px;" class="btn btn-info pull-right">Lista de prestadores</a>
    </div>
    <div class="panel-body">
        <table class="table" id="tbl-prestadores-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Institución</th>
                    <th>Período</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php


                if (!empty($prestadores)): ?>
                    <?php
                    foreach ($prestadores as $prestador):

                        $id = $prestador['id_prestador'];
                    ?>
                        <tr>
                            <td><?php echo $prestador['id_prestador']; ?></td>
                            <td><?php echo $prestador['nombre_compl']; ?></td>
                            <td><?php echo $prestador['carrera']; ?></td>
                            <td><?php echo $prestador['institucion']; ?></td>
                            <td><?php echo $prestador['periodo']; ?></td>
                            <td><?php echo $prestador['estado']; ?></td>
                            <td>
                                <a href="<?= base_url('prestador/edit/' . $id . '')  ?>" button class="btn btn-info">Editar</button a>
                                    <a href="<?= base_url('prestador/delete/' . $id . '')  ?>"
                                        onclick="if(! confirm('Are you sure want to delete?')) return false;"
                                        button class="btn btn-danger">Delete</button a>
                            </td>
                        </tr>
                    <?php
                    endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<a href="<?= base_url('/logout')  ?>" class="btn btn-back float-end">Cerrar sesion</a>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
    $(function() {

        $("#tbl-prestadores-list").DataTable()
    });
</script>

<?= $this->endSection() ?>