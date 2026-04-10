<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Ventas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <?php
    $id = ""; $c = ""; $p = ""; $can = ""; $pre = ""; $tot = "";
    if (isset($_GET['edit'])) {
        $res = mysqli_query($conexion, "SELECT * FROM ventas WHERE id=" . $_GET['edit']);
        $row = mysqli_fetch_assoc($res);
        $id = $row['id']; $c = $row['cliente']; $p = $row['producto']; 
        $can = $row['cantidad']; $pre = $row['precio']; $tot = $row['total'];
    }
    ?>

    <div class="card">
        <h2><?php echo $id ? "Editar Venta" : "Sistema de ventas"; ?></h2>
        <form action="<?php echo $id ? 'actualizar.php' : 'guardar.php'; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Cliente:</label>
            <input type="text" name="cliente" value="<?php echo $c; ?>" required>
            <label>Producto:</label>
            <input type="text" name="producto" value="<?php echo $p; ?>" required>
            <label>Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" value="<?php echo $can; ?>" oninput="calcular()" required>
            <label>Precio Unitario:</label>
            <input type="number" step="0.01" name="precio" id="precio" value="<?php echo $pre; ?>" oninput="calcular()" required>
            <label>Total:</label>
            <input type="text" name="total" id="total" value="<?php echo $tot; ?>" readonly style="background:#f9f9f9">

            <button type="submit" class="<?php echo $id ? 'btn-update' : 'btn-save'; ?>">
                <?php echo $id ? "Actualizar" : "Registrar Venta"; ?>
            </button>
            <?php if($id) echo '<a href="index.php" style="display:block; text-align:center; margin-top:10px;">Cancelar</a>'; ?>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Cliente</th><th>Producto</th><th>Cant.</th><th>Precio</th><th>Total</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = mysqli_query($conexion, "SELECT * FROM ventas");
            while($f = mysqli_fetch_assoc($res)): ?>
            <tr>
                <td><?php echo $f['cliente']; ?></td>
                <td><?php echo $f['producto']; ?></td>
                <td><?php echo $f['cantidad']; ?></td>
                <td>$<?php echo $f['precio']; ?></td>
                <td>$<?php echo $f['total']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $f['id']; ?>" class="btn-edit">Editar</a>
                    <a href="eliminar.php?id=<?php echo $f['id']; ?>" class="btn-delete" onclick="return confirm('¿Borrar?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>