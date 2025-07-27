{{-- resources/views/superadmin/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dashboard Super Administrador
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Bienvenido, {{ auth()->user()->name }} 👋<br>
                    Estás en el panel de control del <strong>Super Administrador</strong>.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

