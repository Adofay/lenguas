<?= $this->extend('layout/app'); ?>

<?= $this->section("title") ?>
Nuevo
<?= $this->endSection() ?>

<?= $this->section("styles") ?>
<style>
    #frm-add-student label.error {
        color: red;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section("body") ?>

<?php

if (isset($validation)) {

    //print_r($validation->listErrors());
}

?>
<h1><?php echo $_SESSION['usuario']; ?></h1>
<div class="panel panel-primary">
    <div class="panel-heading">
        Datos prestador
        <a href="<?= base_url('prestador-list') ?>" style="margin-top: -7px;" class="btn btn-info pull-right">Lista de prestadores</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" id="frmadd" action="<?= base_url('agregar') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="control-label col-sm-2" for="nombre_compl">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre_compl" name="nombre_compl" placeholder="Introduce nombre">
                    <?php
                    if (isset($validation) && $validation->hasError("nombre_compl")) {
                        echo "<span class='custom-error'>" . $validation->getError("nombre_compl") . "</span>";
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="carrera">Carrera:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Carrera" name="carrera" placeholder="Introduzca carrera">
                    <?php
                    if (isset($validation) && $validation->hasError("carera")) {
                        echo "<span class='custom-error'>" . $validation->getError("carrera") . "</span>";
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="institucion">Institucion:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="institucion" name="institucion" placeholder="Introduce institucion">
                    <?php
                    if (isset($validation) && $validation->hasError("institucion")) {
                        echo "<span class='custom-error'>" . $validation->getError("institucion") . "</span>";
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="periodo">Periodo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="periodo" name="periodo" placeholder="Introduce periodo">
                    <?php
                    if (isset($validation) && $validation->hasError("periodo")) {
                        echo "<span class='custom-error'>" . $validation->getError("periodo") . "</span>";
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="estado">Estado:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Introduce estado">
                    <?php
                    if (isset($validation) && $validation->hasError("estado")) {
                        echo "<span class='custom-error'>" . $validation->getError("estado") . "</span>";
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="crear" class="btn btn-success">Crear</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script> -->

<script>
    $(function() {

        // $("#frmadd").validate();
    });
</script>

<?= $this->endSection() ?>