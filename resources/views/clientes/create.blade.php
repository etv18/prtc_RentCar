<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- resources/views/clientes/create.blade.php -->
                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" style="background-color: transparent; width:100%; border-radius:8px;" required><br><br>

                        <label for="cedula">Cédula:</label>
                        <input type="text" name="cedula" style="background-color: transparent; width:100%; border-radius:8px;"
                            pattern="\d{11}" title="La cédula debe tener exactamente 11 dígitos"
                            maxlength="11" required><br><br>

                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" style="background-color: transparent; width:100%; border-radius:8px;" required><br><br>

                        <label for="telefono">Teléfono:</label>
                        <input type="text" name="telefono" style="background-color: transparent; width:100%; border-radius:8px;"
                            pattern="\d{10}" title="El numero de telefono debe tener exactamente 10 dígitos"
                            maxlength="10" required><br><br>

                        <x-primary-button class="">Guardar Cliente</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>