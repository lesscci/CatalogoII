<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Detalles del Proveedor</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-6 py-4">
                @if ($proveedor)
                <h2 class="text-lg font-bold">{{ $proveedor->nombre }}</h2>

                <p class="text-gray-500">ID: {{ $proveedor->id }}</p>
                <p class="text-gray-500">Dirección: {{ $proveedor->direccion}}</p>
                <p class="text-gray-500">Teléfono: {{ $proveedor->telefono }}</p>
                @else
                <p>No se encontró el proveedor.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>