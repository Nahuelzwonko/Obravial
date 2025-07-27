<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Dashboard Admin Empresa</h2>
    </x-slot>

    <div class="py-6 px-6">
        Bienvenido, {{ auth()->user()->name }} (Admin Empresa)
    </div>
</x-app-layout>
