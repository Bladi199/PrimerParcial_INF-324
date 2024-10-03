<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Propiedades</th>
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
