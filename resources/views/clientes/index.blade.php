<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients Register') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('clientes.create') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm text-center text-black bg-white border border-gray-300 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2"
                        style=" margin-left: 5%; width: 14%; border-radius: 8px; font-weight:900; font-size: 15px;">
                        {{__('Add New Client')}}
                    </a>
                    <center>
                        <table style="margin-top: 0.5%; border: solid 2px; border-radius: 5px; width: 90%;">
                            <tbody style="text-align: center; background-color: #4f7db7">
                                <td style="border: solid 2px;"><strong style="font-size: 25px;">Nombre</strong></td>
                                <td style="border: solid 2px;"><strong style="font-size: 25px;">Cédula</strong></td>
                                <td style="border: solid 2px;"><strong style="font-size: 25px;">Dirección</strong></td>
                                <td style="border: solid 2px;"><strong style="font-size: 25px;">Télefono</strong></td>
                                <td style="border: solid 2px;"><strong style="font-size: 25px;">Acciones</strong></td>
                            </tbody>
                            @foreach($clientes as $cliente)
                            <tbody style="padding: 8px; text-align: center;">
                                <td style="border: solid 2px;">{{ $cliente->nombre }}</td>
                                <td style="border: solid 2px;">{{ $cliente->cedula }}</td>
                                <td style="border: solid 2px;">{{ $cliente->direccion }}</td>
                                <td style="border: solid 2px;">{{ $cliente->telefono }}</td>
                                <td style="border: solid 2px;">
                                    <a href="{{ route('clientes.edit', $cliente) }}" class="bg-blue-500 text-white font-bold py-0.4 px-4 rounded hover:bg-blue-900" style="margin: 2px;">
                                        Editar
                                    </a>

                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="post">
                                        @csrf @method('DELETE')
                                        <a href="{{ route('clientes.destroy', $cliente) }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="bg-red-500 text-white font-bold py-0.5 px-4 rounded hover:bg-red-900" style="margin: 2px; margin-top:1px;">
                                            Borrar
                                        </a>
                                    </form>
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>