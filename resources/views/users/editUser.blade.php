{{-- formulario para editar usuarios --}}
@extends('layouts.main')
@section('contenido')
    @php
    foreach ($user as $key => $value) {
        $id = $value->id;
        $nombre = $value->name;
        $email = $value->email;
        $contra = $value->password;
        $rol = $value->rol;
    }
    // Desencriptamos para que se muestre la consaseña real y no la encriptada
    // var_dump( $contra);
    // No se puede desencriptar una contraseña por hash
    // var_dump( Hash::check('plain-text', $contra));
    // El hash::check solo sirve para comprobar si una contraseña es correcta
    @endphp
    <div class="border border-gray-800 rounded bg-gray-100">
        <form class="p-5" action="{{ route('panel.update', $id) }}" method="POST">
            @csrf
            @method('put')
            <table>
                <tr>
                    <td><label for="name">Nombre: </label></td>
                    <td><input style="border-radius: 20px" type="text" value="{{ $nombre }}" name="name" id="name">
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input style="border-radius: 20px" type="email" value="{{ $email }}" name="email" id="email">
                    </td>
                </tr>
                <tr>
                    {{-- value="{{ $contra }}" --}}
                    <td><label for="password">Contraseña: </label></td>
                    <td><input style="border-radius: 20px"  type="password" name="password"
                            id="password" required></td>
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
