@extends('layouts.main')
@section('contenido')
    <div class="border border-gray-800 rounded bg-gray-100">
        <form class="p-5" action="{{ route('panel.store') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td><label for="name">Nombre: </label></td>
                    <td><input style="border-radius: 20px" type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input style="border-radius: 20px" type="email" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><label for="password">Contraseña: </label></td>
                    <td><input style="border-radius: 20px" type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td><label for="rol">Rol: </label></td>
                    <td><select style="border-radius: 20px; cursor: pointer;" name="rol" id="rol">
                            <option value="admin">Admin</option>
                            <option value="usuario">usuario</option>
                        </select></td>
                </tr>
                <tr>
                    <td colspan="2"><input
                            class="mt-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3"
                            style="cursor: pointer" type="submit" value="Guardar Datos"></td>
                </tr>
            </table>
            
        </form>
    </div>
    <a class="mt-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3"
            href="{{ route('panel.panel') }}">Cancelar</a>
@endsection
