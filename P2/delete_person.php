<?php
include("db.php");

if (isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    
    // Primero, elimina las propiedades asociadas en Catastro
    $query = "DELETE FROM Catastro WHERE ci = $ci";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    // Luego, elimina la persona
    $query = "DELETE FROM Persona WHERE ci = $ci";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $_SESSION['message'] = 'Persona Eliminada Exitosamente';
    $_SESSION['message_type'] = 'danger';
    header('Location: index.php');
}
?>
