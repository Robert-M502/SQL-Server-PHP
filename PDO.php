<!-- PDO -->
<?php
$conn = new PDO("sqlsrv:server=DESKTOP-K3MAPGD\ROBERT;Database=tiendaonline", "sa", "admin");

$query = "SELECT TOP 3
v.fecha,
p.nombre,
c.nombre
FROM productos p 
INNER JOIN categorias c ON p.idCat = c.idCat
INNER JOIN ventas v ON p.idProd = v.idProd";

$stmt =  $conn->query($query);

// FETCH_NUM 

/* WHILE */
/* while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    echo $row['0'];
    echo $row['1'];
    echo $row['2'];
    echo "<br>";
} */

/* FOREACH */
/* $result = $stmt->fetchAll(PDO::FETCH_NUM);
if ($result) {
    foreach ($result as $row) {
        echo $row['0'];
        echo $row['1'];
        echo $row['2'];
        echo "<br>";
    }
} else {
    echo "No hay resgiro encotrados";
} */



// FETCH::ASSOC

$query2 = "SELECT TOP 3
v.fecha,
p.nombre
FROM ventas v
INNER JOIN productos p ON v.idProd = p.idProd";
$stmt2 = $conn->query($query2);

/* $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
if ($result) {
    foreach ($result as $row) {
        echo $row['fecha'];
        echo $row['nombre'];
        echo "<br>";
    }
} else {
    echo "NO HAY REGISTROS";
} */

while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    echo $row['fecha'];
    echo $row['nombre'];
    echo "<br>";
}
