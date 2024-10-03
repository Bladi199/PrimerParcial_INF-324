<?php
include("db.php");

$ci = '';
$nombre = '';
$paterno = '';

if (isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    $query = "SELECT * FROM Persona WHERE ci='$ci'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $paterno = $row['paterno'];
    }
}

if (isset($_POST['update'])) {
    $ci = $_GET['ci'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];

    $query = "UPDATE Persona SET nombre = '$nombre', paterno = '$paterno' WHERE ci='$ci'";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Persona Actualizada Exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: CRUD.php');
}
?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_person.php?ci=<?php echo $ci; ?>" method="POST">
                    <div class="form-group">
                        <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar Nombre" required>
                    </div>
                    <div class="form-group">
                        <input name="paterno" type="text" class="form-control" value="<?php echo $paterno; ?>" placeholder="Actualizar Apellido Paterno" required>
                    </div>
                    <button class="btn btn-primary w-45 mt-2" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
