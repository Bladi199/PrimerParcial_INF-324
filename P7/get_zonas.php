<?php
include 'db.php'; 

// Verificar si 'idDistrito' está presente en la URL
if (isset($_GET['idDistrito']) && !empty($_GET['idDistrito'])) {
    $idDistrito = $_GET['idDistrito'];

    // Verificar que el valor sea un número entero
    if (is_numeric($idDistrito)) {
        $sql = "SELECT id_zona, nombre_zona FROM Zona WHERE id_Distrito = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idDistrito);
        $stmt->execute();
        $result = $stmt->get_result();

        $zonas = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $zonas[] = $row;
            }
        }

        // Enviar la respuesta en formato JSON
        echo json_encode($zonas);
        $stmt->close();
    } else {
        echo json_encode(["error" => "El valor de idDistrito no es válido."]);
    }
} else {
    echo json_encode(["error" => "idDistrito no enviado o está vacío."]);
}

$conn->close();
?>

