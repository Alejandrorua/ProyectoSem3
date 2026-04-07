<?php
include("conexion.php");

// ACTUALIZAR (Simple)
if (isset($_POST['editar'])) {
    $id = $_POST['id']; $c = $_POST['cliente'];
    $p = $_POST['producto']; $cant = $_POST['cantidad'];
    $pre = $_POST['precio']; $tot = $cant * $pre;

    mysqli_query($conexion, "UPDATE ventas SET cliente='$c', producto='$p', cantidad='$cant', precio='$pre', total='$tot' WHERE id=$id");
    header("Location: index.php");
}
?>