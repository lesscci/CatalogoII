<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Listado de Proveedores</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if ($data)
                    @foreach($data as $proveedor)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $proveedor->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $proveedor->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $proveedor->direccion }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $proveedor->telefono }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- Agrega aquí los enlaces para editar y eliminar -->
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5">No hay proveedores disponibles</td>
                    </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>
</x-app-layout>