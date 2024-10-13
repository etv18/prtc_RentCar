<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <center>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="width: 60%;">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- resources/views/clientes/create.blade.php -->
                        <form action="{{ route('vehiculos.store') }}" method="POST">
                            @csrf
                            <center>
                                <p style="font-size: 20px;">{{__('Creating Car Record')}}</p>
                                <center>
                                    <div class="container" style="display: flex; gap: 10%;">
                                        <div class="w-full">
                                            <label for="marca">Marca:</label>
                                            <input type="text" name="marca" style="background-color: transparent; width:100%; border-radius:8px;" required><br><br>

                                            <label for="modelo">Modelo:</label>
                                            <input type="text" name="modelo" style="background-color: transparent; width:100%; border-radius:8px;" required><br><br>

                                            <label for="ano_creacion">Año:</label>
                                            <input type="text" name="ano_creacion" style="background-color: transparent; width:100%; border-radius:8px;"
                                                pattern="\d{4}" title="El año debe tener exactamente 4 dígitos"
                                                maxlength="4" requiredrequired><br><br>
                                        </div>

                                        <div class="w-full">
                                            <label for="color">Color:</label>
                                            <input type="text" name="color" style="background-color: transparent; width:100%; border-radius:8px;"><br><br>

                                            <label for="gama">Gama:</label>
                                            <select name="gama_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach($gamas as $gama)
                                                <option value="{{ $gama->id }}">{{ $gama->gama }}</option>
                                                @endforeach
                                            </select><br><br>
                                        </div>
                                    </div>

                                    <x-primary-button class="w-full px-6 py-3 inline-flex items-center justify-center"
                                        style="font-weight: 600;">{{ __('Save Car') }}</x-primary-button>
                        </form>

                    </div>
                </div>
            </div>
        </center>
    </div>
</x-app-layout>