@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Crear Usuario</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superadmin.usuarios.guardar') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Nombre</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="border rounded p-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="border rounded p-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Rol</label>
            <select name="role" required class="border rounded p-2 w-full">
                <option value="">Seleccionar rol</option>
                <option value="admin_empresa" {{ old('role') == 'admin_empresa' ? 'selected' : '' }}>Administrador Empresa</option>
                <option value="mecanico" {{ old('role') == 'mecanico' ? 'selected' : '' }}>Mecánico</option>
                <option value="operador" {{ old('role') == 'operador' ? 'selected' : '' }}>Operador</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" required class="border rounded p-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" required class="border rounded p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Crear Usuario</button>
    </form>
</div>
@endsection
