<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-white mb-6 text-center">Facturas</h1>

        @foreach ($tickets as $ticket)
            <div class="mt-5">
                <h2 class="text-xl font-semibold text-white mb-4">Tarjeta: {{ $ticket->tarjeta }}</h2>
                <table class="min-w-full bg-gray-700 text-white rounded-md">
                    <thead>
                        <tr class="border-b border-gray-600">
                            <th class="py-3 px-6">Denominación</th>
                            <th class="py-3 px-6 ">Código</th>
                            <th class="py-3 px-6 ">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = $ticket->productos->sum('precio');
                        @endphp

                        @foreach ($ticket->productos as $producto)
                            <tr>
                                <td class="py-4 px-6">{{ $producto->denominacion }}</td>
                                <td class="text-center py-4 px-6">{{ $producto->codigo }}</td>
                                <td class="text-right py-4 px-6">{{ $producto->precio }} €</td>
                            </tr>
                        @endforeach
                        <tr class="font-bold border-t border-gray-600">
                            <td class="py-4 px-6 text-left"> Total:</td>

                            <td colspan="2"class="py-4 px-6 text-right">  {{ $total }} €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach


        {{-- <h3 class="text-2xl font-semibold text-white mt-6">Total: <span class="text-green-400">{{ $carrito->getTotal() }} €</span></h3> --}}

    </div>
</x-app-layout>
