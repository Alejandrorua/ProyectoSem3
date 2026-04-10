<?php
include("conexion.php");
$c = $_POST['cliente'];
$p = $_POST['producto'];
$can = $_POST['cantidad'];
$pre = $_POST['precio'];
$tot = $can * $pre;

mysqli_query($conexion, "INSERT INTO ventas VALUES (NULL, '$c', '$p', '$can', '$pre', '$tot')");
header("Location: index.php");
?>