<x-app-layout><x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Software: Desarrolladores y Lenguajes
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Bienvenida -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-2">
                    Bienvenido a nuestro proyecto
                </h1>

                <p>
                    En este proyecto conoceremos diferentes tipos de
                    desarrolladores y los principales lenguajes de
                    programación utilizados en el desarrollo de software.
                </p>
            </div>
        </div>

        <!-- Desarrolladores y lenguajes -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Desarrolladores -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">
                        👨‍💻 Desarrolladores
                    </h2>

                    <p class="mb-4">
                        Los desarrolladores son profesionales encargados
                        de crear y mantener aplicaciones y sistemas.
                    </p>

                    <ul class="list-disc ml-6">
                        <li>Frontend</li>
                        <li>Backend</li>
                        <li>Full Stack</li>
                        <li>Desarrollador de aplicaciones</li>
                    </ul>
                </div>
            </div>

            <!-- Lenguajes -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">
                        💻 Lenguajes de programación
                    </h2>

                    <p class="mb-4">
                        Los lenguajes de programación permiten crear
                        diferentes tipos de software y aplicaciones.
                    </p>

                    <ul class="list-disc ml-6">
                        <li>Java</li>
                        <li>Python</li>
                        <li>JavaScript</li>
                        <li>PHP</li>\
                        <li>C++</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>

</x-app-layout>
