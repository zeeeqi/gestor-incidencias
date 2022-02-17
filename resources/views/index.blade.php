@extends('layouts.main')

@section('contenido')
    <div class="relative flex flex-col items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0 w-3/4 ">

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <div class="pt-4 pb-1 border border-gray-800 rounded bg-gray-100">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    {{ __('Desconectar') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-lg text-gray-700  underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrarme</a>
                    @endif
                @endauth
            </div>
        @endif

        <div>
            <p class="text-3xl">Bienvenido {{ explode(' ', Auth::user()->name)[0] }}</p>
        </div>
        <div class="w-full md:w-3/5 mx-auto p-8">
            <p><strong>Incidencias</strong></p>
            @foreach ($incidencias as $incidencia)
                <div class="shadow-md {{ $incidencia->estado == 'pendiente' ? ' bg-red-300' : 'bg-green-300' }}">
                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single{{ $incidencia->id }}" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer"
                            for="tab-single{{ $incidencia->id }}">{{ $incidencia->titulo }}</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                            <p class="px-5 py-3">Creada por:<strong> {{ $incidencia->username }}</strong></p>
                            <p class="px-5">Fecha: <strong>{{ $incidencia->created_at }}</strong></p>
                            <p class="px-5">Estado: <strong>{{ ucfirst($incidencia->estado) }}</strong></p>
                            <p class="px-5 py-3">{{ $incidencia->contenido }}</p>
                            <p class="px-5 py-3 mb-5">
                                <a href="{{ route('incidencia.delete', $incidencia->id) }}"
                                    class="bg-indigo-500 py-2 px-4 text-white hover:bg-indigo-400 rounded">Eliminar</a>
                                @if (Auth::user()->isAdmin())
                                    <a href="{{ route('incidencia.reparar', $incidencia->id) }}"
                                        class="bg-indigo-500 mx-5 py-2 px-4 text-white hover:bg-indigo-400 rounded">Reparar</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $incidencias->links() }}
        <div class="flex w-2/4">
            <a href="{{ route('form.add', $incidencia->id) }}"
                class="bg-indigo-500 self-start mt-5 py-2 px-4 text-white hover:bg-indigo-400 rounded">Añadir incidencia</a>
        </div>
    </div>
@endsection
