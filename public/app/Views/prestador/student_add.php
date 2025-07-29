<?= $this->extend("\Views\prestador") ?>

<?= $this->section("title") ?>
Add Student Page
<?= $this->endSection() ?>

<?= $this->section("styles") ?>
<style>
  #frm-add-student label.error{
      color:red;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section("body") ?>

<?php

   if(isset($validation)){

     //print_r($validation->listErrors());
   }

?>

<div class="panel panel-primary">
    <div class="panel-heading">
        Create Student
        <a href="<?= base_url('prestador') ?>" style="margin-top: -7px;" class="btn btn-info pull-right">List Student</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" id="frm-add-student" action="<?= base_url('prestador/add') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    <?php
                        if(isset($validation) && $validation->hasError("name")){
                            echo "<span class='custom-error'>".$validation->getError("name")."</span>";
                        }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    <?php
                        if(isset($validation) && $validation->hasError("email")){
                            echo $validation->getError("email");
                        }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone_number">Phone Number:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="profile_image">Profile Image:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
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

       // $("#frm-add-student").validate();
    });
</script>

<?= $this->endSection() ?>