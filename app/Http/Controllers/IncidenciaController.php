<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use Illuminate\Support\Facades\Auth;

class IncidenciaController extends Controller
{
    function index()
    {
        $incidencias = Incidencia::select('incidencias.*', 'u.name as username', 'u.id as user_id','reparado.name as reparado_name')
            ->join('users as u', 'u.id', "=", 'incidencias.user_id_creado')
            ->leftJoin('users as reparado','reparado.id',"=", 'incidencias.user_id_reparado')
            ->orderBy('incidencias.estado', 'asc')
            ->orderBy('incidencias.created_at', 'desc')
            ->paginate(7);

        return view('index', compact('incidencias'));
    }

    function delete(Incidencia $incidencia)
    {
        $incidencia->delete();

        return redirect()->route('incidencia.index');
    }

    function reparar(Incidencia $incidencia)
    {

        if ($incidencia) {
            $incidencia->estado = 'reparada';
            $incidencia->user_id_reparado = Auth::user()->id;
            $incidencia->save();
        }

        return redirect()->back();
    }

    function store(Request $request)
    {
        Incidencia::create($request->all());

        return redirect()->back()->with('success', 'Incidencia registrada correctamente.');
    }

    function update(Incidencia $incidencia, Request $request)
    {
        $incidencia->titulo = $request->titulo;
        $incidencia->contenido = $request->contenido;
        $incidencia->save();

        return view('formUpdate', compact('incidencia'))->with('success','Registro modificado correctamente.');
    }
}
