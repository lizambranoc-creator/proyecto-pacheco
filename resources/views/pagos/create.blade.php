<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nuevo Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('pagos.store') }}" method="POST">
                    @csrf

                    <!-- Factura -->
                    <div class="mb-4">
                        <label for="factura_id" class="block text-gray-700 text-sm font-bold mb-2">Seleccionar Factura:</label>
                        <select name="factura_id" id="factura_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">-- Seleccione una factura --</option>
                            @foreach ($facturas as $factura)
                                <option value="{{ $factura->id }}">
                                    Factura #{{ $factura->id }} - Total: ${{ number_format($factura->total, 2) }}
                                </option>
                            @endforeach
                        </select>
                        @error('factura_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Método de Pago -->
                    <div class="mb-4">
                        <label for="metodo_pago_id" class="block text-gray-700 text-sm font-bold mb-2">Método de Pago:</label>
                        <select name="metodo_pago_id" id="metodo_pago_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">-- Seleccione un método --</option>
                            @foreach ($metodosPago as $metodo)
                                <option value="{{ $metodo->id }}">
                                    {{ $metodo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('metodo_pago_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Monto -->
                    <div class="mb-4">
                        <label for="monto" class="block text-gray-700 text-sm font-bold mb-2">Monto a Pagar:</label>
                        <input type="number" step="0.01" name="monto" id="monto" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="0.00" required>
                        @error('monto')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha de Pago -->
                    <div class="mb-6">
                        <label for="fecha_pago" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Pago:</label>
                        <input type="date" name="fecha_pago" id="fecha_pago" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ date('Y-m-d') }}" required>
                        @error('fecha_pago')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('pagos.index') }}" class="text-gray-600 hover:text-gray-900 font-semibold text-sm">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                            Guardar Pago
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>