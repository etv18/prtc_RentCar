<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <center>
                        <p style="font-weight: bold; font-size:25px">{{ __("Making Invoice") }}</p>
                    </center>
                    <form action="{{ route('facturas.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2 place-items-center">
                            <div class="rows-3" style="width: 60%;">
                                <div style="display:flex; gap: 8px;">
                                    <div>
                                        <p style="font-weight: bold; font-size:18px">No Factura: </p>
                                    </div>
                                    <div>
                                        <p style="font-weight: bold; font-size:18px">{{ $nuevoId }}</p>
                                    </div>
                                </div>
                                <div style="display:flex; gap: 8px;">
                                    <div>
                                        <p style="font-weight: bold; font-size:15px">Usuario: </p>

                                    </div>
                                    <div>
                                        <p style="font-weight: bold; font-size:15px">{{ auth()->user()->name }}</p>
                                    </div>
                                </div>
                                <div style="display:flex; gap: 8px;">
                                    <div>
                                        <p style="font-weight: bold; font-size:16px; margin-top:20%;">Cliente:</p>

                                    </div>
                                    <div style="width: 100%;">
                                        <select name="cliente_id" style="width: 87%; margin-top:3px" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">Seleccionar</option>
                                            @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="display:flex; gap: 8px;">
                                <div>
                                    <p style="font-weight: bold; font-size:18px">Fecha:</p>
                                </div>

                                <div>
                                    <p style="font-weight: bold; font-size:18px">dd/mm/aaaa</p>
                                </div>
                            </div>
                        </div>

                        <div id="detalles" class="flex justify-center">
                            <div class="detalle" style="display:flex; gap:8px;">
                                <div style="width: 30%;">
                                    <label for="vehiculos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehiculo/s:</label>
                                    <select id="vehiculo_id" name="vehiculo_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <option value="">Seleccionar</option>
                                        @foreach($vehiculos as $vehiculo)
                                        <option value="{{ $vehiculo->id }}" data-gama="{{ $vehiculo->gama_id }}">{{ $vehiculo->marca ." ". $vehiculo->modelo ." ". $vehiculo->ano_creacion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="cantidad_dias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dias a Rentar: </label>
                                    <input type="number" id="cantidad_dias" name="cantidad_dias[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                                </div>
                                <div>
                                    <label for="fecha_fin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio por Día: </label>
                                    <input type="number" id="precio_dia" name="precio_dia[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required readonly />
                                </div>
                                <div>
                                    <label for="vehiculo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Por Vehículo: </label>
                                    <input type="number" id="total_vehiculo" name="total_vehiculo[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required readonly />
                                </div>
                                <div>
                                    <label for="fecha_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Incio de la Renta: </label>
                                    <input type="date" id="fecha_inicio" name="fecha_inicio[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                                </div>
                                <div>
                                    <label for="fecha_fin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Final de la Renta: </label>
                                    <input type="date" id="fecha_fin" name="fecha_fin[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="total" class="mt-3 mr-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                style="font-weight: bold; font-size:20px">TOTAL: </label>
                            <input type="number" id="total" name="total"
                                class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required readonly />
                        </div>

                        <x-primary-button class="w-1/4 mt-3 px-6 py-3 inline-flex items-center justify-center"
                            style="font-weight: 600;">{{ __('Save Bill') }}</x-primary-button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Convertir las gamas de PHP a un objeto JavaScript
        const gamas = @json($gamas);

        // Obtener los elementos del DOM
        const selectAuto = document.getElementById('vehiculo_id');
        const inputPrecioDia = document.getElementById('precio_dia');
        const cantidad_dias = document.getElementById('cantidad_dias');
        const total = document.getElementById('total');
        const total_vehiculo = document.getElementById('total_vehiculo');

        //Obtener los datos de las fechas
        let inp_fecha_inicio = document.getElementById('fecha_inicio').value;
        let fecha_inicio;
        let dias;

        let selectedOption = selectAuto.options[selectAuto.selectedIndex];
        let gamaIdSeleccionada = selectedOption.dataset.gama; //aqui tengo el id de la gama seleccionada
        // Buscar en el array de gamas el precio correspondiente a la gama seleccionada
        let gamaSeleccionada = gamas.find(gama => gama.id == gamaIdSeleccionada);

        // Función para actualizar el precio por día según la gama seleccionada
        selectAuto.addEventListener('change', function() {
            const vehiculoIdSeleccionado = this.value;
            if (cantidad_dias.value !== '' && total.value !== '') {
                cantidad_dias.value = '';
                total.value = '';
            }
            selectedOption = selectAuto.options[selectAuto.selectedIndex];
            gamaIdSeleccionada = selectedOption.dataset.gama; //aqui tengo el id de la gama seleccionada
            // Buscar en el array de gamas el precio correspondiente a la gama seleccionada
            gamaSeleccionada = gamas.find(gama => gama.id == gamaIdSeleccionada);
            inputPrecioDia.value = gamaSeleccionada.precio;
            total_vehiculo.value = inputPrecioDia.value;
            console.log(gamaSeleccionada);
        });

        cantidad_dias.addEventListener('input', function() {
            // Obtener la cantidad de días
            let dias = Number(cantidad_dias.value);

            // Actualizar el precio por día basado en la cantidad de días
            if (dias > 30) {
                inputPrecioDia.value = gamaSeleccionada.precio_31;
            } else if (dias >= 15 && dias <= 30) {
                inputPrecioDia.value = gamaSeleccionada.precio_15;
            } else {
                inputPrecioDia.value = gamaSeleccionada.precio;
            }

            // Convertir el valor de inputPrecioDia a número
            let precio = Number(inputPrecioDia.value);

            // Calcular el total y actualizar el valor
            total_vehiculo.value = dias * precio;
            total.value = dias * precio;

            // Obtener el valor del input de fecha de inicio
            let inp_fecha_inicio = document.getElementById('fecha_inicio').value;
            let fecha_inicio;

            // Si no se selecciona una fecha de inicio, usar la fecha actual
            if (inp_fecha_inicio === '') {
                fecha_inicio = new Date(); // Usar la fecha actual

            } else {
                fecha_inicio = new Date(inp_fecha_inicio); // Usar la fecha seleccionada
            }

            // Sumar los días a la fecha de inicio
            fecha_inicio.setDate(fecha_inicio.getDate() + dias);

            // Formatear la fecha final en 'YYYY-MM-DD'
            let year = fecha_inicio.getFullYear();
            let month = String(fecha_inicio.getMonth() + 1).padStart(2, '0');
            let day = String(fecha_inicio.getDate()).padStart(2, '0');
            let fechaFinal = `${year}-${month}-${day}`;

            // Asignar la fecha final al input de fecha final
            document.getElementById('fecha_fin').value = fechaFinal;
        });
    </script>
</x-app-layout>

<!--
<div>
    
                                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website URL</label>
                                <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" required />
                            </div>
                            <div>
                                <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unique visitors (per month)</label>
                                <input type="number" id="visitors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                        </div>
                        <div class="mb-6">
                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                        </div>
                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
                        </div>
-->



<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
</button>

<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>

                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Add new product
                    </button>
            </form>
        </div>
    </div>
</div>