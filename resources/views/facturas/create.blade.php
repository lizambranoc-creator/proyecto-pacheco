<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nueva Factura') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('facturas.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Cliente</label>
                            <select name="cliente_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">-- Seleccionar Cliente --</option>
                                @foreach($clientes as$cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Fecha</label>
                            <input type="date" name="fecha" value="{{ date('Y-m-d') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                    </div>

                    <h3 class="font-bold text-lg mb-3">Detalle de Productos</h3>
                    
                    <table class="w-full mb-4 border" id="tabla-productos">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 border">Producto</th>
                                <th class="p-2 border" style="width: 150px;">Cantidad</th>
                                <th class="p-2 border" style="width: 180px;">Precio Unitario</th>
                                <th class="p-2 border" style="width: 80px;">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="filas-productos">
                            <tr class="fila-item">
                                <td class="p-2 border">
                                    <select name="productos[0][producto_id]" class="w-full border-gray-300 rounded-md" required>
                                        <option value="">-- Seleccionar Producto --</option>
                                        @foreach($productos as$producto)
                                            <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{$producto->precio }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="p-2 border">
                                    <input type="number" name="productos[0][cantidad]" min="1" value="1" class="w-full border-gray-300 rounded-md" required>
                                </td>
                                <td class="p-2 border">
                                    <input type="number" step="0.01" name="productos[0][precio_unitario]" placeholder="0.00" class="w-full border-gray-300 rounded-md" required>
                                </td>
                                <td class="p-2 border text-center">
                                    <button type="button" class="bg-red-500 text-white px-3 py-1 rounded btn-eliminar">X</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="button" id="btn-agregar" class="bg-gray-600 text-white px-4 py-2 rounded mb-6">
                        + Agregar Producto
                    </button>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('facturas.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">Cancelar</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold">Guardar Factura</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let index = 1;
        document.getElementById('btn-agregar').addEventListener('click', function () {
            const contenedor = document.getElementById('filas-productos');
            const primeraFila = contenedor.querySelector('.fila-item');
            const nuevaFila = primeraFila.cloneNode(true);

            // Actualizar names para el array productos[N]
            nuevaFila.querySelectorAll('select, input').forEach(element => {
                element.name = element.name.replace(/\[\d+\]/, `[${index}]`);
                if (element.tagName === 'INPUT' && element.type !== 'number') element.value = '';
                if (element.type === 'number' && element.name.includes('cantidad')) element.value = 1;
            });

            contenedor.appendChild(nuevaFila);
            index++;
        });

        document.getElementById('filas-productos').addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-eliminar')) {
                const filas = document.querySelectorAll('.fila-item');
                if (filas.length > 1) {
                    e.target.closest('tr').remove();
                }
            }
        });
    </script>
</x-app-layout>