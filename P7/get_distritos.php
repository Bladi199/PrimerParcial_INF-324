<?php
include 'db.php'; 

$sql = "SELECT id_distrito, nombre_distrito FROM DISTRITO";
$result = $conn->query($sql);

$distritos = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $distritos[] = $row;
    }
}

// Enviar la respuesta en formato JSON
echo json_encode($distritos);

$conn->close();
?>
