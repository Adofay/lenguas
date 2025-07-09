<?= $this->extend('layout/app'); ?>

<?= $this->section("title") ?>
Editar
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
//print_r($prestador);

?>
<h1><?php echo $_SESSION['usuario']; ?></h1>
<div class="panel panel-primary">
    <div class="panel-heading">
        Editar prestador
        <a href="<?= base_url('prestador-list') ?>" style="margin-top: -7px;" class="btn btn-info pull-right">Lista de estudiantes</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" id="frmadd" action="<?= base_url('actualizar') ?>" method="post" enctype="multipart/form-data">
        
        <div input hidden id="id_prestador" name="id_prestador" value="<?= $prestador ['id_prestador'] ?>" class="form-group">
                <label class="control-label col-sm-2" for="id_prestador">ID:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_prestador" name="id_prestador" placeholder="ID" value="<?= $prestador ['id_prestador'] ?>">
                    <?php
                    if (isset($validation) && $validation->hasError("id_prestador")) {
                        echo "<span class='custom-error'>" . $validation->getError("id_prestador") . "</span>";
                    }
                    ?>
                </div>
            </div>     
        
        <div class="form-group">
                <label class="control-label col-sm-2" for="nombre_compl">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre_compl" name="nombre_compl" placeholder="Introduce nombre" value="<?= $prestador ['nombre_compl'] ?>">
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
                    <input type="text" class="form-control" id="Carrera" name="carrera" placeholder="Introduzca carrera" value="<?= $prestador ['carrera'] ?>">
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
                    <input type="text" class="form-control" id="institucion" name="institucion" placeholder="Introduce institucion" value="<?= $prestador ['institucion'] ?>">
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
                    <input type="text" class="form-control" id="periodo" name="periodo" placeholder="Introduce periodo" value="<?= $prestador ['periodo'] ?>">
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
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Introduce estado" value="<?= $prestador ['estado'] ?>">
                    <?php
                    if (isset($validation) && $validation->hasError("estado")) {
                        echo "<span class='custom-error'>" . $validation->getError("estado") . "</span>";
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="crear" class="btn btn-success">Guardar cambios</button>
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