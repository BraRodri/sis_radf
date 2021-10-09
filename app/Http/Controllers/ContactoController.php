<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //
    public function index()
    {
        return view('pages.contacto.index');
    }

    public function insert(Request $request)
    {
        //dd($request);

        $data = array(
            'tipo' => $request->type,
            'nombres' => $request->name,
            'email' => $request->email,
            'celular' => $request->phone,
            'comentarios' => $request->message
        );

        if(Contacto::create($data)){
            session()->flash('error', 'success');
            return redirect()->route('contacto');
        } else {
            session()->flash('error', 'failure');
            return redirect()->route('contacto');
        }

    }

    public function view()
    {
        $datos = Contacto::all();
        return view('pages.contacto.view')
            ->with('datos', $datos);
    }
}
