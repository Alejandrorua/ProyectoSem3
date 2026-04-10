<?php
include("conexion.php");
$id = $_POST['id'];
$c = $_POST['cliente'];
$p = $_POST['producto'];
$can = $_POST['cantidad'];
$pre = $_POST['precio'];
$tot = $can * $pre;

mysqli_query($conexion, "UPDATE ventas SET cliente='$c', producto='$p', cantidad='$can', precio='$pre', total='$tot' WHERE id=$id");
header("Location: index.php");
?>