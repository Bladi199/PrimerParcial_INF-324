<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <div class="card card-body">
        <form action="save_person.php" method="POST">
          <div class="form-group">
            <input type="text" name="ci" class="form-control" placeholder="CI" autofocus required>
          </div>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
          </div>
          <div class="form-group">
            <input type="text" name="paterno" class="form-control" placeholder="Apellido Paterno" required>
          </div>
          <input type="submit" name="save_person" class="btn btn-primary btn-block mt-2" value="Guardar Persona">
        </form>
        <a href="index.php" class="btn btn-primary btn-block mt-2">Volver</a> 
      </div>
      <div>
      <a href="listado.php" class="button primary mt-2">Listar personas por tipo de Impuesto</a> </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM Persona";
          $result_personas = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_personas)) { ?>
          <tr>
            <td><?php echo $row['ci']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['paterno']; ?></td>
            <td>
              <a href="edit_person.php?ci=<?php echo $row['ci']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_person.php?ci=<?php echo $row['ci']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
              <a href="propiedades.php?ci=<?php echo $row['ci']?>" class="btn btn-secondary">
                <i class="fas fa-home"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
