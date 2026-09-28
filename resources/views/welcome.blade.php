<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-sm text-center border border-gray-100">
        <!-- Título principal -->
        <h1 class="text-3xl font-bold text-gray-800 mb-1">Bienvenido</h1>
        <p class="text-gray-500 text-sm mb-6">Elige una opción para continuar</p>

        <!-- Botón Registrarse -->
        <a href="{{ route('register') }}" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-3 px-4 rounded-xl flex items-center justify-center gap-2 mb-3 shadow-md transition-colors">
            📄 Registrarse
        </a>

        <!-- Botón Iniciar Sesión -->
        <a href="{{ route('login') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-xl flex items-center justify-center gap-2 mb-6 shadow-md transition-colors">
            🔑 Iniciar Sesión
        </a>

        <!-- Enlace inferior -->
        <a href="#" class="text-xs text-gray-400 hover:underline">
            ¿Problemas? Contáctanos
        </a>
    </div>

</body>
</html>
