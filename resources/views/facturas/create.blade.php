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

                    <form action="{{ route('facturas.store') }}">
                        <div class="grid gap-6 mb-6 md:grid-cols-2 place-items-center">
                            <div class="rows-3" style="width: 60%;">
                                <div style="display:flex; gap: 8px;">
                                    <div>
                                        <p style="font-weight: bold; font-size:18px">No Factura</p>
                                    </div>
                                    <div>
                                        <p name="factura_id" style="font-weight: bold; font-size:18px">$001$</p>
                                    </div>
                                </div>
                                <div style="display:flex; gap: 8px;">
                                    <div>
                                        <p style="font-weight: bold; font-size:15px">Usuario</p>

                                    </div>
                                    <div>
                                        <p style="font-weight: bold; font-size:15px">$NombreUsuario$</p>
                                    </div>
                                </div>
                                <div style="display:flex; gap: 8px;">
                                    <div>
                                        <p style="font-weight: bold; font-size:16px; margin-top:20%;">Cliente</p>

                                    </div>
                                    <div style="width: 100%;">
                                        <select name="cliente_id" style="width: 87%; margin-top:3px" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">cliente1cliente3</option>
                                            <option value="">cliente2cliente2</option>
                                            <option value="">cliente3cliente3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="display:flex; gap: 8px;">
                                <div>
                                    <p style="font-weight: bold; font-size:18px">Fecha</p>
                                </div>

                                <div>
                                    <p style="font-weight: bold; font-size:18px">dd/mm/aaaa</p>
                                </div>
                            </div>
                        </div>

                        <div id="detalles" class="flex justify-center">
                            <div class="detalle" style="display:flex; gap:8px;">
                                <div style="width: 30%;">
                                    <label for="vehiculos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehiculo/s</label>
                                    <select name="vehiculo_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Seleccionar</option>
                                        <option value="">vehiculovehiculo2</option>
                                        <option value="">vehiculovehiculo3</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="cantidad_dias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dias a Rentar</label>
                                    <input type="number" name="cantidad_dias[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                                </div>
                                <div>
                                    <label for="fecha_fin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio por Día</label>
                                    <input type="number" name="precio_dia[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                                </div>
                                <div>
                                    <label for="vehiculo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Por Vehículo</label>
                                    <input type="number" name="total_vehiculo[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                                </div>
                                <div>
                                    <label for="fecha_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Incio de la Renta</label>
                                    <input type="date" name="fecha_incio[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                                </div>
                                <div>
                                    <label for="fecha_fin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Final de la Renta</label>
                                    <input type="date" name="fecha_fin[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                                </div>
                            </div>
                        </div>

                        <div class="btn-add">
                            <button type="button" onclick="addDettalle()"
                                class="mt-1 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Add</button>
                        </div>
                        <button type="submit"
                            class="mt-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
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