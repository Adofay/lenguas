<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<head>
    <meta charset="UTF-8">
    <title>Tabla de Personas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #e0e0e0;
        }

        .btn {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
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
            background-color:rgb(33, 150, 243);
            color: white;
            padding: 10px 15px;
            margin-bottom: 20px;
            display: inline-block;
            text-decoration: none;

        }
    </style>
</head>

<body>

    <h1>Lista de prestadores</h1>
    <h1 class="text-end">Bienvenido</h1>
    <a href="<?= base_url('prestador/add')  ?>" class="btn-add">Agregar Persona</a>
    <a href="<?= base_url('/')  ?>" class="btn btn-back float-end">Salir</a>


    <table>
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
                            <a href="<?= base_url('prestador/edit/' . $id . '')  ?>" button class="btn btn-edit">Editar</button a>
                                <a href="<?= base_url('prestador/delete/' . $id . '')  ?>"
                                    onclick="if(! confirm('Are you sure want to delete?')) return false;"
                                    button class="btn btn-delete">Delete</button a>
                        </td>
                    </tr>
                <?php
                endforeach; ?>
            <?php endif; ?>
            <!-- Puedes agregar más filas aquí -->
        </tbody>
    </table>
</body>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>

<?= $this->endSection(); ?>