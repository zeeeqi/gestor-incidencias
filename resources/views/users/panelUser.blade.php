@extends('layouts.main')
@section('contenido')
    <div class="flex flex-col gap-1">
        <div class="row">
            <div class="col-md-12 table border border-gray-800 rounded bg-gray-100 ">
                <table class="p-1" style="margin: 25px; ">
                    <thead class="text-primary" >
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr style="height: 50px !important">
                                <td>{{ $user->name }}</td>
                                <td style="text-align: center;">{{ $user->email }}</td>
                                <td>{{ $user->rol }}</td>
                                <td>
                                    <a href="{{route('panel.edit', $user->id)}}"  class="mt-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" style="width: 115px">Modificar</a>
                                </td>
                                <td>
                                    @php
                                    // var_dump($user);    
                                    @endphp
                                        <a href="{{route('panel.delete', $user->id)}}" onclick="return confirm('¿Quieres borrar el usuario?')" style="cursor: pointer;"  value="Eliminar" class="mt-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" style="width: 115px">
                                        Eliminar </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" style="width: 100px">
               <a href="{{ route('panel.create') }}">Añadir Usuario</a> 
               
        </div>
        
    </div>
    <a class="mt-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3"
    href="{{ route('incidencia.index') }}">Volver</a>
@endsection
