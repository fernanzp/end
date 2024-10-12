@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h1 class="text-3xl font-bold text-gray-800">Bienvenido, {{ $user->name }}</h1>

    <div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Atención!</strong>
        <span class="block sm:inline">No tienes un apellidos registrados, porfavor agregalos</span>
    </div>

    <form action="{{ route('user.updateLastName') }}" method="POST" class="mt-6 bg-white shadow-md rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold">Apellidos</label>
            <input type="text" class="w-full mt-2 p-2 border border-gray-300 rounded-lg @error('last_name') border-red-500 @enderror" 
                   id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Apellido Paterno, Apellido Materno" required>
            @error('email')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Guardar
        </button>
    </form>
</div>
@endsection
