<?php
include("db.php");

$codigo = '';
$zona = '';
$Xini = '';
$Xfin = '';
$Yini = '';
$Yfin = '';
$superficie = '';
$distrito = '';
$ci = '';

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $query = "SELECT * FROM Catastro WHERE codigo='$codigo'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $zona = $row['zona'];
        $Xini = $row['Xini'];
        $Xfin = $row['Xfin'];
        $Yini = $row['Yini'];
        $Yfin = $row['Yfin'];
        $superficie = $row['superficie'];
        $distrito = $row['distrito'];
        $ci = $row['ci'];
    }
}

if (isset($_POST['update'])) {
    $codigo = $_GET['codigo'];
    $zona = $_POST['zona'];
    $Xini = $_POST['Xini'];
    $Xfin = $_POST['Xfin'];
    $Yini = $_POST['Yini'];
    $Yfin = $_POST['Yfin'];
    $superficie = $_POST['superficie'];
    $distrito = $_POST['distrito'];
    $ci = $_POST['ci'];

    $query = "UPDATE Catastro SET zona = '$zona', Xini = '$Xini', Xfin = '$Xfin', Yini = '$Yini', Yfin = '$Yfin', superficie = '$superficie', distrito = '$distrito', ci = '$ci' WHERE codigo='$codigo'";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Catastro Actualizado Exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}
?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_catastro.php?codigo=<?php echo $codigo; ?>" method="POST">
                    <div class="form-group">
                        <input name="zona" type="text" class="form-control" value="<?php echo $zona; ?>" placeholder="Actualizar Zona" required>
                    </div>
                    <div class="form-group">
                        <input name="Xini" type="text" class="form-control" value="<?php echo $Xini; ?>" placeholder="Actualizar Xini" required>
                    </div>
                    <div class="form-group">
                        <input name="Xfin" type="text" class="form-control" value="<?php echo $Xfin; ?>" placeholder="Actualizar Xfin" required>
                    </div>
                    <div class="form-group">
                        <input name="Yini" type="text" class="form-control" value="<?php echo $Yini; ?>" placeholder="Actualizar Yini" required>
                    </div>
                    <div class="form-group">
                        <input name="Yfin" type="text" class="form-control" value="<?php echo $Yfin; ?>" placeholder="Actualizar Yfin" required>
                    </div>
                    <div class="form-group">
                        <input name="superficie" type="text" class="form-control" value="<?php echo $superficie; ?>" placeholder="Actualizar Superficie" required>
                    </div>
                    <div class="form-group">
                        <input name="distrito" type="text" class="form-control" value="<?php echo $distrito; ?>" placeholder="Actualizar Distrito" required>
                    </div>
                    <div class="form-group">
                        <input name="ci" type="text" class="form-control" value="<?php echo $ci; ?>" placeholder="Actualizar CI del dueño" required>
                    </div>
                    <button class="btn btn-primary w-50 mt-2" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
