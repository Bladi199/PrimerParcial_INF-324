<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
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
            <th>Impuesto</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result_catastros)) { ?>
          <tr>
            <td><?php echo $row['codigo']; ?></td>
            <td><?php echo $row['zona']; ?></td>
            <td><?php echo $row['superficie']; ?></td>
            <td><?php echo $row['distrito']; ?></td>
              <!-- Enlace para ver el detalle del impuesto de la propiedad 
              <a href="impuesto.php?codigo=" class="btn btn-secondary">
                <i class="fas fa-coins"></i>
              </a>
            </td>-->
            <td>
            <!-- Formulario para enviar el código catastral -->
            <form id="form_<?php echo $row['codigo']; ?>" action="http://localhost:30763/Impuesto/Index" method="get" style="display:none;">
                <input type="hidden" name="codigoCatastral" value="<?php echo $row['codigo']; ?>">
            </form>

            <!-- Icono que dispara el envío del formulario -->
            <a href="#" onclick="document.getElementById('form_<?php echo $row['codigo']; ?>').submit();" class="btn btn-secondary">
                <i class="fas fa-coins"></i>
            </a>
            </td>



          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php
        } else {
          echo "<p>No se encontraron propiedades para esta persona.</p>";
        }
      } else {
        echo "<p>CI no proporcionado.</p>";
      }
      ?>
      
    <a href="index.php" class="btn btn-primary btn-block mt-6">Volver</a> 
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
