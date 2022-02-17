<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class IncidenciaController extends Controller
{
    function index()
    {
        $incidencias = Incidencia::select('incidencias.*', 'u.name as username')
            ->join('users as u', 'u.id', "=", 'incidencias.user_id_creado')
            ->orderBy('incidencias.estado', 'asc')
            ->orderBy('incidencias.created_at', 'desc')
            ->paginate(7);

        return view('index', compact('incidencias'));
    }

    function delete($id)
    {
        $inc = Incidencia::find($id);

        if ($inc) {
            $inc->delete();
        }

        return redirect()->route('incidencia.index');
    }

    function reparar($id)
    {
        $inc = Incidencia::find($id);

        if ($inc) {
            $inc->estado = 'reparada';
            $inc->save();
        }

        return redirect()->back();
    }

    function store(Request $request)
    {
        $incidencia = Incidencia::create($request->all());
        return redirect()->back()->with('success','Incidencia registrada correctamente');
    }
}
