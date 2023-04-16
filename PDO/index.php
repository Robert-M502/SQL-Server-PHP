<?php
require 'conexion.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - SQL SERVER</title>
</head>
<?php
$sql = "SELECT TOP 2 
v.fecha,
p.nombre,
c.nombre
FROM productos p 
INNER JOIN ventas v ON v.idProd = p.idProd
INNER JOIN categorias c ON c.idCat = p.idCat
ORDER BY v.fecha DESC";
$query = $conn->query($sql);
$result = $query->fetchAll(PDO::FETCH_NUM);
?>
<h4>ULTIMOS PRODUCTOS VENDIDOS</h4>

<body>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row) {
            ?>
                <tr>
                    <td> <?php echo $row['0']; ?> </td>
                    <td> <?php echo $row['1']; ?> </td>
                    <td> <?php echo $row['2']; ?> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

<?php
$sql = "SELECT p.idProd, p.nombre, c.nombre, p.precio FROM productos p
        INNER JOIN categorias c ON c.idCat = p.idCat";
$query = $conn->query($sql);
?>
<h4>PRODUCTOS</h4>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $query->fetch(PDO::FETCH_NUM)) {
        ?>
            <tr>
                <td> <?php echo $row['0']; ?></td>
                <td> <?php echo $row['1']; ?></td>
                <td> <?php echo $row['2']; ?></td>
                <td> <?php echo $row['3']; ?></td>
                <td>
                    <a href="modificar.php?idProd=<?php echo $row['0']; ?>">Modificar</a>
                </td>
            <tr>
            <?php } ?>
    </tbody>
</table>

</html>