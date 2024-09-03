<?php
include 'conexion.php'; // Incluye la conexión a la base de datos

// Consulta para obtener todos los usuarios
$sql = "SELECT * FROM clientes";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            background-image: url('fondo.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Usuarios Registrados</h2>
        <table class="table table-striped table-light table-hover">
            <thead>
                <tr>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $fila['rut']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['apellido']; ?></td>
                    <td><?php echo $fila['direccion']; ?></td>
                    <td><?php echo $fila['correo_electronico']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $fila['id_cliente']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar.php?id=<?php echo $fila['id_cliente']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conexion->close(); // Cierra la conexión a la base de datos
?>
