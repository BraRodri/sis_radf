<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroArchivosController extends Controller
{
    //
    public function archivos()
    {
        return view('pages.registro.archivos');
    }

    public function historial()
    {
        return view('pages.registro.historial');
    }
}
