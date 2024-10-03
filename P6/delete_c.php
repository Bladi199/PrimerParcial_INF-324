<?php
include("db.php");

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $query = "SELECT ci FROM Catastro WHERE codigo = '$codigo'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ci = $row['ci']; 

        $query = "DELETE FROM Catastro WHERE codigo = '$codigo'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed: " . mysqli_error($conn));
        }

        $_SESSION['message'] = 'Catastro Eliminado Exitosamente';
        $_SESSION['message_type'] = 'danger';

        header('Location: propiedades.php?ci=' . urlencode($ci));
        exit; 
    } else {
        $_SESSION['message'] = 'No se encontró el catastro con el código proporcionado.';
        $_SESSION['message_type'] = 'warning';
        header('Location: index.php');
        exit;
    }
} else {
    $_SESSION['message'] = 'Código no proporcionado.';
    $_SESSION['message_type'] = 'danger';
    header('Location: index.php');
    exit;
}
?>
