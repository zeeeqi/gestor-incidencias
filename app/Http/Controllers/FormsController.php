<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    function add()
    {
        return view('formAdd');
    }

    function update(Incidencia $incidencia)
    {

        if ($incidencia) {
            return view('formUpdate', compact('incidencia'));
        }

        return redirect()->route('incidencia.index');
    }
}
