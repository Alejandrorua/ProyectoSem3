<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Ventas</title>
    <link rel="stylesheet" href="estilos.css">
    <!-- <style>
        body {
            font-family: sans-serif;
            background: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin-bottom: 30px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            font-weight: bold;
        }

        table {
            background: white;
            border-collapse: collapse;
            width: 80%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #0000FF;
            color: white;
        }

        .btn-del {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-edit {
            color: green;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }
    </style> -->
</head>

<body>

    <?php
    $id = "";
    $c = "";
    $p = "";
    $cant = "";
    $pre = "";
    $tot = "";
    if (isset($_GET['editar_id'])) {
        $res = mysqli_query($conexion, "SELECT * FROM ventas WHERE id=" . $_GET['editar_id']);
        $row = mysqli_fetch_assoc($res);
        $id = $row['id'];
        $c = $row['cliente'];
        $p = $row['producto'];
        $cant = $row['cantidad'];
        $pre = $row['precio'];
        $tot = $row['total'];
    }
    ?>

    <div class="card">
        <h2>Sistema de ventas</h2>
        <form action="procesar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Cliente:</label>
            <input type="text" name="cliente" value="<?php echo $c; ?>" placeholder="Nombre Cliente" required>
            <label>Producto:</label>
            <input type="text" name="producto" value="<?php echo $p; ?>" placeholder="Producto" required>
            <label>Cantidad:</label>
            <input type="number" name="cantidad" id="c" value="<?php echo $cant; ?>" oninput="calc()" required>
            <label>Precio Unitario:</label>
            <input type="number" step="0.01" name="precio" id="p" value="<?php echo $pre; ?>" oninput="calc()" required>
            <label>Total:</label>
            <input type="text" name="total" id="t" value="<?php echo $tot; ?>" readonly style="background:#eee">

            <?php if ($id == ""): ?>
                <button type="submit" name="crear">Registrar Venta</button>
            <?php else: ?>
                <button type="submit" name="editar" style="background: green;">Guardar Cambios</button>
                <a href="index.php" style="display:block; text-align:center; margin-top:10px;">Cancelar</a>
            <?php endif; ?>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cant.</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $datos = mysqli_query($conexion, "SELECT * FROM ventas");
            while ($f = mysqli_fetch_assoc($datos)): ?>
                <tr>
                    <td><?php echo $f['cliente']; ?></td>
                    <td><?php echo $f['producto']; ?></td>
                    <td><?php echo $f['cantidad']; ?></td>
                    <td>$<?php echo $f['precio']; ?></td>
                    <td>$<?php echo $f['total']; ?></td>
                    <td>
                        <a href="index.php?editar_id=<?php echo $f['id']; ?>" class="btn-edit">Editar</a>
                        <a href="procesar.php?eliminar=<?php echo $f['id']; ?>" class="btn-del" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
        function calc() {
            let q = document.getElementById('c').value || 0;
            let pr = document.getElementById('p').value || 0;
            document.getElementById('t').value = (q * pr).toFixed(2);
        }
    </script>
</body>

</html>