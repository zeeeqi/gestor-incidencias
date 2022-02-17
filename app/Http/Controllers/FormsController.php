<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    function add()
    {
        return view('formAdd');
    }
}
