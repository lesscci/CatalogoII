<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Carrito de compras</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unidades</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($carrito as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item['nombre'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item['precio'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="number" name="unidades" value="{{ $item['unidades'] }}" min="1" max="10">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('carrito.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold">Total:</td>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold">${{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
