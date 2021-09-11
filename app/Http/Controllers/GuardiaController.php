<?php

namespace App\Http\Controllers;

use App\Models\Guardia;
use Illuminate\Http\Request;

class GuardiaController extends Controller
{
    //
    public function index()
    {
        return view('pages.guardia.index');
    }

    public function crear(Request $request)
    {
        $type = '';
        $data = '';

        $fecha_inicio = $request->fecha_desde . " " . $request->hora_desde;
        $fecha_fin = $request->fecha_hasta . " " . $request->hora_hasta;

        $data = array(
            'user_id' => $request->user_id,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
        );

        if($resultado = Guardia::create($data)){
            $type = 'success';
            $data = $resultado;
        } else {
            $type = 'failure';
        }

        echo json_encode(array('type' => $type, 'data' => $data));
    }

    public function obtener()
    {
        $informacion = Guardia::all();
        $data = array();

        if(count($informacion) > 0){
            foreach ($informacion as $key => $value) {
                $nuevo_array = array(
                    'title' => 'Guardia: ' . $value->user->names,
                    'start' => $value->fecha_inicio,
                    'end' => $value->fecha_fin,
                    'descripcion' => $value->descripcion,
                    'idGuardia' => $value->id,
                    'color' => '#3490dc',
                    'nombreUsuario' => $value->user->names,
                    'batallonUsuario' => $value->user->brigada,
                    'gradoUsuario' => $value->user->grado,
                    'distintivoUsuario' => $value->user->distintivo,
                );
                array_push($data, $nuevo_array);
            }
        }

        echo json_encode($data);
    }

    public function eliminar(Request $request)
    {
        $id = $request->idGuarida;
        if(Guardia::findOrFail($id)->delete()){
            $type = 'success';
        } else {
            $type = 'failure';
        }

        echo json_encode(array('type' => $type));
    }
}
