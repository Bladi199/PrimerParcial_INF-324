<?php 
include('db.php');
$USUARIO = $_POST['usuario'];
$PASSWORD = $_POST['password'];

$consulta = "SELECT * FROM funcionario WHERE USERNAME='$USUARIO' AND PASSWORD='$PASSWORD'";
$resultado = mysqli_query($conn, $consulta);

$fila = mysqli_num_rows($resultado);

if ($fila) {
    header("location: CRUD.php");
} else {
    // Incluimos de nuevo el archivo login.php para mostrar el formulario de login
    include("login.php");
    // Mostramos un mensaje de error sobre el formulario
    echo '
    <div id="error-message" class="alert alert-danger" role="alert" style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        z-index: 10;
        width: 30%;
        ">
        ERROR DE AUTENTIFICACIÓN
    </div>
    <script>
        // Desaparece el mensaje después de 2 segundos (2000 ms)
        setTimeout(function() {
            var message = document.getElementById("error-message");
            if (message) {
                message.style.display = "none";
            }
        }, 2000);
    </script>';
}

mysqli_free_result($resultado);
mysqli_close($conn);
?>
