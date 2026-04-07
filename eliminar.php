<?php
include("conexion.php");

// ELIMINAR
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    mysqli_query($conexion, "DELETE FROM ventas WHERE id=$id");
    header("Location: index.php");
}

?>