<?php
include("conexion.php");
$id = $_GET['id'];
mysqli_query($conexion, "DELETE FROM ventas WHERE id=$id");
header("Location: index.php");
?>