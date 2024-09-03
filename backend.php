<?php
// Conexión a la base de datos
include 'conexion.php';

function validarRut($rut) {
        return true; 
}

function validarTelefono($telefono) {
    return preg_match('/^\+[0-9\s]+$/', $telefono);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $pais = $_POST['pais'];
    $region = $_POST['region'];
    $calle = $_POST['calle'];
    $numero_casa = $_POST['numero_casa'];
    $codigo_postal = $_POST['codigo_postal'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $numero_caso = $_POST['numero_caso'];
    $descripcion_caso = $_POST['descripcion_caso'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $estado_caso = $_POST['estado_caso'];

    $descripcion_sentencia = null;
    $fecha_cierre = null;

    if ($estado_caso === 'cerrado') {
        $descripcion_sentencia = $_POST['descripcion_sentencia'];
        $fecha_cierre = $_POST['fecha_cierre'];
    }

    // Validar los datos
    if (validarRut($rut) && filter_var($correo, FILTER_VALIDATE_EMAIL) && validarTelefono($telefono)) {
        $direccion = "$pais, $region, $calle, $numero_casa, $codigo_postal";

        $sql_check_cliente = "SELECT id_cliente FROM clientes WHERE rut = ?";
        $stmt_check_cliente = $conexion->prepare($sql_check_cliente);
        $stmt_check_cliente->bind_param('s', $rut);
        $stmt_check_cliente->execute();
        $stmt_check_cliente->store_result();

        if ($stmt_check_cliente->num_rows > 0) {
            $stmt_check_cliente->bind_result($id_cliente);
            $stmt_check_cliente->fetch();
        } else {
            $sql_cliente = "INSERT INTO clientes (rut, nombre, apellido, direccion, correo_electronico, telefono)
                            VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_cliente = $conexion->prepare($sql_cliente);
            $stmt_cliente->bind_param('ssssss', $rut, $nombre, $apellido, $direccion, $correo, $telefono);

            if ($stmt_cliente->execute()) {
                $id_cliente = $stmt_cliente->insert_id;
            } else {
                $error = "Error al insertar el cliente: " . addslashes($stmt_cliente->error);
                $stmt_cliente->close();
                showAlertAndRedirect('Error', $error, 'error');
                exit();
            }

            $stmt_cliente->close();
        }

        $stmt_check_cliente->close();

        $sql_caso = "INSERT INTO casos (id_cliente, numero_caso, descripcion_caso, fecha_inicio, estado_caso, descripcion_sentencia, fecha_cierre)
                     VALUES (?, ?, ?, STR_TO_DATE(?, '%Y-%m-%d'), ?, ?, STR_TO_DATE(?, '%Y-%m-%d'))";
        
        $stmt_caso = $conexion->prepare($sql_caso);
        $stmt_caso->bind_param('issssss', $id_cliente, $numero_caso, $descripcion_caso, $fecha_inicio, $estado_caso, $descripcion_sentencia, $fecha_cierre);

        if ($stmt_caso->execute()) {
            showAlertAndRedirect('Registro exitoso', 'El cliente se registró correctamente.', 'success');
        } else {
            $error = "Error al insertar el caso: " . addslashes($stmt_caso->error);
            showAlertAndRedirect('Error', $error, 'error');
        }

        $stmt_caso->close();
    } else {
        showAlertAndRedirect('Error', 'Datos inválidos, por favor verifica la información.', 'error');
    }

    $conexion->close();
}

function showAlertAndRedirect($title, $text, $icon) {
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Redireccionando...</title>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: '$title',
                text: '$text',
                icon: '$icon',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
        </script>
    </body>
    </html>";
}
?>
