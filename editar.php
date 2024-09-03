<?php
include 'conexion.php'; // Incluye la conexión a la base de datos

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del usuario seleccionado
    $sql = "SELECT * FROM clientes WHERE id_cliente = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    // Verifica si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $rut = $_POST['rut'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];

        // Actualiza los datos del usuario en la base de datos
        $sql_update = "UPDATE clientes SET rut = ?, nombre = ?, apellido = ?, direccion = ?, correo_electronico = ?, telefono = ? WHERE id_cliente = ?";
        $stmt_update = $conexion->prepare($sql_update);
        $stmt_update->bind_param("ssssssi", $rut, $nombre, $apellido, $direccion, $correo, $telefono, $id);
        if ($stmt_update->execute()) {
            echo "Usuario actualizado correctamente.";
            header("Location: usuarios.php"); // Redirige a la lista de usuarios
            exit;
        } else {
            echo "Error al actualizar el usuario: " . $conexion->error;
        }
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit;
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Usuario</h2>
        <form action="editar.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="rut">RUT:</label>
                <input type="text" class="form-control" id="rut" name="rut" value="<?php echo $usuario['rut']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $usuario['correo_electronico']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario['telefono']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="usuarios.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
