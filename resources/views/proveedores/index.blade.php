<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Listado de Proveedores</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
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
                            <a href="/proveedores/{{ $proveedor->id }}/edit" class="text-blue-500 hover:text-blue-600 underline mr-2">Editar</a>
                            <form action="/proveedores/{{ $proveedor->id }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 underline">Eliminar</button>
                            </form>
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

    <style>
    .alert {
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #f5f5f5;
        color: #333;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }
    </style>
</x-app-layout>