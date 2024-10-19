<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<form>
    <!-- Selector de vehículos -->
    <label for="vehiculo_id">Selecciona un vehículo:</label>
    <select id="vehiculo_id" name="vehiculo_id">
        <!-- Aquí debes generar los vehículos dinámicamente -->
        @foreach ($vehiculos as $vehiculo)
        <option value="{{ $vehiculo->id }}">{{ $vehiculo->nombre }}</option>
        @endforeach
    </select>

    <!-- Campo para ingresar la cantidad de días -->
    <label for="dias">Número de días:</label>
    <input type="number" id="dias" name="dias" placeholder="Cantidad de días">

    <!-- Campo para mostrar el precio calculado -->
    <label for="precio_por_dia">Precio por día:</label>
    <input type="text" id="precio_por_dia" name="precio_por_dia" readonly>

    <button type="submit">Reservar</button>
</form>

<script>
    $(document).ready(function() {
        $('#vehiculo_id, #dias').on('change', function() {
            let vehiculoId = $('#vehiculo_id').val();
            let dias = $('#dias').val();

            if (vehiculoId && dias) {
                $.ajax({
                    url: '{{ route('
                    calcular.precio ') }}', // Ruta que apunta a tu controlador
                    method: 'POST',
                    data: {
                        vehiculo_id: vehiculoId,
                        dias: dias,
                        _token: '{{ csrf_token() }}' // Incluye el token CSRF
                    },
                    success: function(response) {
                        $('#precio_por_dia').val(response.precio); // Mostrar el precio en el campo correspondiente
                    }
                });
            }
        });
    });
</script>