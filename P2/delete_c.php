<?php
include("db.php");

// Verifica si se recibe el parámetro 'codigo' desde la URL
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Primero, obtenemos el CI asociado al código catastral
    $query = "SELECT ci FROM Catastro WHERE codigo = '$codigo'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    // Verifica si se encontró el catastro y obtiene el CI
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ci = $row['ci']; // Guardamos el CI

        // Ahora, eliminamos las propiedades asociadas en Catastro usando 'codigo'
        $query = "DELETE FROM Catastro WHERE codigo = '$codigo'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed: " . mysqli_error($conn));
        }

        // Mensaje de éxito
        $_SESSION['message'] = 'Catastro Eliminado Exitosamente';
        $_SESSION['message_type'] = 'danger';

        // Redirige a propiedades.php con el CI obtenido
        header('Location: propiedades.php?ci=' . urlencode($ci));
        exit; // Es recomendable usar exit después de header
    } else {
        // Mensaje en caso de que no se encuentre el código catastral
        $_SESSION['message'] = 'No se encontró el catastro con el código proporcionado.';
        $_SESSION['message_type'] = 'warning';
        header('Location: index.php');
        exit;
    }
} else {
    // Mensaje en caso de que no se proporcione el código
    $_SESSION['message'] = 'Código no proporcionado.';
    $_SESSION['message_type'] = 'danger';
    header('Location: index.php');
    exit;
}
?>
