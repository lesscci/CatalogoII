<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Listado de Productos</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" style="display: flex;">
            @foreach($data as $producto)
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex-grow-1" style="width: 200px;">
                    <h2 class="text-xl font-bold">{{ $producto->nombre }}</h2>
                    <p class="text-gray-500">{{ $producto->descripcion }}</p>
                    <p class="text-gray-700 font-bold mt-2">${{ $producto->precio }}</p>
                    <div class="mt-4 flex justify-end">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            🛒
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
