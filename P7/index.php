<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Combo Dependiente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Seleccione un distrito y ona</h2>

    <div class="form-group">
        <label for="distrito">Seleccione un distrito:</label>
        <select id="distrito" class="form-control">
            <option value="">Cargando distritos...</option>
        </select>
    </div>

    <div class="form-group">
        <label for="zona">Seleccione una zona:</label>
        <select id="zona" class="form-control">
            <option value="">Seleccione un distrito primero</option>
        </select>
    </div>

    <button id="procesar" class="btn btn-primary">Procesar datos</button>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'get_distritos.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#distrito').empty().append('<option value="">Seleccione un distrito</option>');
                $.each(response, function(key, value) {
                    $('#distrito').append('<option value="'+ value.id_distrito +'">'+ value.nombre_distrito +'</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar distritos: " + error);
                $('#distrito').empty().append('<option value="">Error al cargar distritos</option>');
            }
        });
    });

    $('#distrito').on('change', function() {
        var distritoID = $(this).val();
        if (distritoID) {
            $.ajax({
                url: 'get_zonas.php',
                type: 'GET',
                data: { idDistrito: distritoID },
                dataType: 'json',
                success: function(response) {
                    $('#zona').empty().append('<option value="">Seleccione una zona</option>');
                    $.each(response, function(key, value) {
                        $('#zona').append('<option value="'+ value.id_zona +'">'+ value.nombre_zona +'</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar zonas: " + error);
                }
            });
        } else {
            $('#zona').empty().append('<option value="">Seleccione una zona</option>');
        }
    });

    $('#procesar').on('click', function() {
        var distritoID = $('#distrito').val();
        var zonaID = $('#zona').val();
        var distritoNombre = $('#distrito option:selected').text();
        var zonaNombre = $('#zona option:selected').text();

        if (distritoID && zonaID) {
            window.location.href = 'guardar.php?distrito=' + encodeURIComponent(distritoNombre) + '&zona=' + encodeURIComponent(zonaNombre);
        } else {
            alert('Por favor, seleccione un distrito y una zona.');
        }
    });
</script>

</body>
</html>
