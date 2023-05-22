<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Carrito de Compras</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(count($cartItems) > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($cartItems as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${{ $item->precio }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('productos.removeFromCart', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 flex justify-end">
                <a href="{{ route('productos.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Continuar Comprando
                </a>
            </div>
        @else
            <p>No hay productos en el carrito.</p>
        @endif
    </div>
</x-app-layout>
