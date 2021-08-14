<?php

namespace App\Http\Controllers;

use App\Models\Archives;
use App\Models\Archives_groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegistroArchivosController extends Controller
{
    //
    public function archivos()
    {
        return view('pages.registro.archivos');
    }

    public function historial()
    {
        $archivos = Archives::orderBy('created_at', 'DESC')->get();
        return view('pages.registro.historial')
            ->with('archivos', $archivos);
    }

    public function agregarArchivos(Request $request)
    {
        $url = '';
        $type = '';
        $name_image = '';
        if($request->file('image')){
            $image = $request->file('image')->store('public/archivos');
            $url = Storage::url($image);
            $name_image = $request->file('image')->getClientOriginalName();
            $type = 'success';
        } else {
            $type = 'failure';
        }

        echo json_encode(array('imagen' => $url, 'type' => $type, 'name' => $name_image));
    }

    public function insert(Request $request)
    {
        $datos = array(
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'active' => 1
        );

        if($insert = Archives::create($datos)){

            $id = $insert->id;
            $archivos = $request->nombreArchivos;
            if($archivos){
                for ($i=0; $i < count($archivos) ; $i++) {
                    $post = array(
                        'archive_id' => $id,
                        'archivo' => $archivos[$i],
                        'active' => 1
                    );
                    Archives_groups::create($post);
                }
            }

            session()->flash('error', 'success');
            return redirect()->route('registro.historial');
        } else {
            session()->flash('error', 'failure');
            return redirect()->route('registro.archivos');
        }
    }

    public function verConjuntoArchivos($id)
    {
        $archivo = Archives::find($id);
        $datos = Archives_groups::where('archive_id', $id)->get();
        return view('pages.registro.verArchivos')
            ->with('datos', $datos)
            ->with('archivo', $archivo);
    }
}
