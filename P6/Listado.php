<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas por tipo de impuesto</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Lista de personas por tipo de impuesto</h2>

    <?php
    
    $host = 'localhost'; 
    $dbname = 'bdbladimir'; 
    $username = 'root'; 
    $password = ''; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "
        SELECT Persona.ci, Persona.nombre, Persona.paterno,
               SUM(CASE WHEN LEFT(Catastro.codigo, 1) = '1' THEN 1 ELSE 0 END) AS total_bajo,
               SUM(CASE WHEN LEFT(Catastro.codigo, 1) = '2' THEN 1 ELSE 0 END) AS total_medio,
               SUM(CASE WHEN LEFT(Catastro.codigo, 1) = '3' THEN 1 ELSE 0 END) AS total_alto
        FROM Persona
        JOIN Catastro ON Persona.ci = Catastro.ci
        GROUP BY Persona.ci, Persona.nombre, Persona.paterno
        ORDER BY Persona.ci;
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        echo "<table class='table table-bordered table-striped'>
                <thead class='table-dark'>
                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Paterno</th>
                        <th>Total Bajo</th>
                        <th>Total Medio</th>
                        <th>Total Alto</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['ci']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['paterno']}</td>
                    <td>{$row['total_bajo']}</td>
                    <td>{$row['total_medio']}</td>
                    <td>{$row['total_alto']}</td>
                  </tr>";
        }

        echo "</tbody></table>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error de conexión: " . $e->getMessage() . "</div>";
    }
    ?>
<div>
<a href="CRUD.php" class="btn btn-primary btn-block mt-2">Volver</a> </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
