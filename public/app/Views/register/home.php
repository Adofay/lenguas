<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

        <h1> Bienvenido <?= 'Eusebio'; ?> </h1>

       <a href="<?= base_url('logout'); ?>" class="btn btn-primary">Cerrar sesión</a>

<?= $this->endSection(); ?>        