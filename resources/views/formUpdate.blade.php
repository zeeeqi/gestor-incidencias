@extends('layouts.main')



@section('contenido')

    <div class="flex flex-col w-1/3 ">
        <h3 class="text-center mb-8 text-4xl">Modificar incidencia</h3>
        <form action="{{ route('incidencia.update', $incidencia) }}" method="POST" class="mb-6">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 ">Título</label>
                <input type="text" id="base-input" placeholder="Título.." name="titulo" value={{ $incidencia->titulo }}
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            </div>
            <div class="mb-3">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                <textarea id="message" rows="4" name="contenido"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Describe el problema">{{ $incidencia->contenido }}</textarea>
            </div>
            <button type="submit"
                class="bg-indigo-500 me-3 py-2 px-4 text-white hover:bg-indigo-400 rounded">Modificar</button>
            <button class="bg-indigo-500 mx-5 py-2 px-4 text-white hover:bg-indigo-400 rounded"><a
                    href="{{ route('incidencia.index') }}">Volver</a></button>

        </form>
        @if (session()->has('success'))
            <p class="text-green-800 text-xl">Enhorabuena!</p>
        @endif

    </div>
@endsection
