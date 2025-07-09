<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tabla con Iconos</title>
  <!-- Vincular Font Awesome para los iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .acciones i {
      margin-right: 10px;
      cursor: pointer;
    }

    .acciones i:hover {
      color: #007BFF;
    }
  </style>
</head>
<body>

  <h2>Tabla de Estudiantes</h2>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Carrera</th>
        <th>Institución</th>
        <th>Periodo</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>001</td>
        <td>Juan Pérez</td>
        <td>Ingeniería</td>
        <td>Universidad Central</td>
        <td>2025-1</td>
        <td>Activo</td>
        <td class="acciones">
          <i class="fas fa-plus" title="Agregar"></i>
          <i class="fas fa-edit" title="Editar"></i>
          <i class="fas fa-trash" title="Eliminar"></i>
        </td>
      </tr>
      <!-- Puedes duplicar esta fila para más datos -->
    </tbody>
  </table>

</body>
</html>
