<?php
include('db.php');

if (isset($_GET['save_catastro'])) {
    $codigo = $_GET['codigo'];
    $zona = $_GET['zona'];
    $superficie = $_GET['superficie'];
    $Xini = $_GET['Xini'];
    $Xfin = $_GET['Xfin'];
    $Yini = $_GET['Yini'];
    $Yfin = $_GET['Yfin'];
    $distrito = $_GET['distrito'];

    if (isset($_GET['ci']) && !empty($_GET['ci'])) {
        $ci = $_GET['ci'];
    } else {
        die("El CI no fue proporcionado.");
    }

    $query_check_ci = "SELECT * FROM Persona WHERE ci = '$ci'";
    $result_check_ci = mysqli_query($conn, $query_check_ci);
    
    if (mysqli_num_rows($result_check_ci) == 0) {
        die("El CI proporcionado no existe en la tabla Persona.");
    }

    $query = "INSERT INTO Catastro(codigo, zona, superficie, Xini, Xfin, Yini, Yfin, distrito, ci) 
              VALUES ('$codigo', '$zona', '$superficie', '$Xini', '$Xfin', '$Yini', '$Yfin', '$distrito', '$ci')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $_SESSION['message'] = 'Catastro Guardado Exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: propiedades.php?ci=' . urlencode($ci));
exit; 

}
?>
