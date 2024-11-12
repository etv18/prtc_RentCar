<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador de Fechas</title>
</head>

<body>
    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="date" id="fecha_inicio"><br><br>

    <label for="cantidad_dias">Cantidad de Días:</label>
    <input type="number" id="cantidad_dias" value="5"><br><br>

    <label for="fecha_final">Fecha Final:</label>
    <input type="date" id="fecha_final" readonly><br><br>

    <button onclick="calcularFechaFinal()">Calcular Fecha Final</button>

    <script>
        function calcularFechaFinal() {
            // Obtener el valor del input de fecha de inicio
            let fechaInicioInput = document.getElementById('fecha_inicio').value;
            let fechaInicio;

            // Si no se selecciona fecha de inicio, usar la fecha actual
            if (fechaInicioInput === '') {
                fechaInicio = new Date();
            } else {
                fechaInicio = new Date(fechaInicioInput);
            }

            // Obtener la cantidad de días ingresados
            let cantidadDias = parseInt(document.getElementById('cantidad_dias').value);

            // Sumar los días a la fecha de inicio
            fechaInicio.setDate(fechaInicio.getDate() + cantidadDias);

            // Formatear la fecha final en formato 'YYYY-MM-DD' para el input date
            let year = fechaInicio.getFullYear();
            let month = String(fechaInicio.getMonth() + 1).padStart(2, '0'); // Los meses son 0-indexados
            let day = String(fechaInicio.getDate()).padStart(2, '0');

            let fechaFinalFormateada = `${year}-${month}-${day}`;

            // Mostrar la fecha final en el input de fecha final
            document.getElementById('fecha_final').value = fechaFinalFormateada;
        }
    </script>
</body>

</html>