<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-body">
        <form action="guardar_catastro.php" method="GET"> 
          <div class="form-group">
            <input type="text" name="codigo" class="form-control" placeholder="Código" autofocus required>
          </div>
          <div class="form-group">
            <input type="text" name="zona" class="form-control" placeholder="Zona" required>
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
          <div class="form-group">
            <input type="text" name="distrito" class="form-control" placeholder="Distrito" required>
          </div>
          <input type="hidden" name="ci" value="<?php echo isset($_GET['ci']) ? $_GET['ci'] : ''; ?>">
          <input type="submit" name="save_catastro" class="btn btn-primary w-45 mt-2" value="Guardar Catastro">
          
        <a href="CRUD.php" class="btn btn-primary w-50 mt-2">Volver</a> 
        </form>
      </div>
    </div>

    <div class="col-md-8">
      <?php
      if (isset($_GET['ci'])) {
        $ci = $_GET['ci'];
        $query = "SELECT * FROM Catastro WHERE ci = '$ci'";
        $result_catastros = mysqli_query($conn, $query);

        if (mysqli_num_rows($result_catastros) > 0) {
      ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Código Catastral</th>
            <th>Zona</th>
            <th>Superficie</th>
            <th>Distrito</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Itera sobre los catastros relacionados con la persona
          while ($row = mysqli_fetch_assoc($result_catastros)) { ?>
          <tr>
            <td><?php echo $row['codigo']; ?></td>
            <td><?php echo $row['zona']; ?></td>
            <td><?php echo $row['superficie']; ?></td>
            <td><?php echo $row['distrito']; ?></td>
            <td>
              <a href="edit_c.php?codigo=<?php echo $row['codigo']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_c.php?codigo=<?php echo $row['codigo']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php
        } else {
          // Mensaje en caso de que no se encuentren catastros relacionados
          echo "<p>No se encontraron propiedades para esta persona.</p>";
        }
      } else {
        // Mensaje en caso de que no se reciba un CI en la URL
        echo "<p>CI no proporcionado.</p>";
      }
      ?>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
