<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gobierno Autónomo Municipal de Viacha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px; 
        }
        .navbar {
            background-color: #f2f4f4; 
        }
        .nav-link {
            color: #000; 
        }
        .nav-link:hover,
        .nav-link:focus {
            color: #0056b3; 
        }
        
        .btn-custom {
            background-color: #007bff; 
            color: white; 
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #ffffff; 
        }
    </style>
</head>
<body>
    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">GAM La Paz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tramites.php">Trámites y Servicios</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
