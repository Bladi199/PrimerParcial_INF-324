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
          <input type="submit" name="save_person" class="btn btn-success btn-block" value="Guardar Persona">
        </form>
      </div>
      <div class="card card-body">

     <!-- <form action="guardar_catastro.php" method="GET"> 
          <div class="form-group">
            <input type="text" name="codigo" class="form-control" placeholder="Código" autofocus required>
          </div>
          <div class="form-group">
            <input type="text" name="superficie" class="form-control" placeholder="Superficie" required>
          </div>
          <div class="form-group">
            <input type="text" name="Xini" class="form-control" placeholder="Coordenada X inicial" required>
          </div>
          <div class="form-group">
            <input type="text" name="Xfin" class="form-control" placeholder="Coordenada X final" required>
          </div>
          <div class="form-group">
            <input type="text" name="Yini" class="form-control" placeholder="Coordenada Y inicial" required>
          </div>
          <div class="form-group">
            <input type="text" name="Yfin" class="form-control" placeholder="Coordenada Y final" required>
          </div>
          <input type="submit" name="save_catastro" class="btn btn-primary w-45 mt-2" value="Guardar Catastro">
          
        <a href="index.php" class="btn btn-primary w-50 mt-2">Volver</a> 
        </form>-->
      </div>


    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
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
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
