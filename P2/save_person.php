<?php
include('db.php');

if (isset($_POST['save_person'])) {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];

    // Insertar nueva persona
    $query = "INSERT INTO Persona(ci, nombre, paterno) VALUES ('$ci', '$nombre', '$paterno')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed.");
    }


    $_SESSION['message'] = 'Persona Guardada Exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: CRUD.php');
}
?>
