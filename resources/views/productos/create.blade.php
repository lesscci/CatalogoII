<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Añadir Producto</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-input rounded-md border-gray-300" required>
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="form-textarea rounded-md border-gray-300" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
                    <input type="number" name="precio" id="precio" class="form-input rounded-md border-gray-300" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
