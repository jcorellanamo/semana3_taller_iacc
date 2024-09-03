<?php
include 'conexion.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL Elimina
    $sql = "DELETE FROM clientes WHERE id_cliente = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar el usuario: " . $conexion->error;
    }

    header("Location: usuarios.php");
    exit;
} else {
    echo "ID de usuario no proporcionado.";
}

$conexion->close();
?>
