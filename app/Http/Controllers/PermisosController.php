<?php

namespace App\Http\Controllers;

use App\Models\Permisos;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class PermisosController extends Controller
{
    public function index()
    {
        $permisos = Permisos::orderBy('created_at', 'DESC')->get();
        return view('pages.solicitudes.index')
            ->with('permisos', $permisos);
    }

    public function insert(Request $request)
    {
        //dd($request);

        //boleta
        $n_boleta = random_int(1, 99999);

        //datos soldado
        $id_user = $request->user;
        $user = User::findOrFail($id_user);
        $nombres = $user->names;
        $cedula = $user->document;
        $telefono = $request->telefono;

        //guarnicion
        if($request->guarnicion == 1){
            $guarnicion = 'Si';
        } else {
            $guarnicion = 'No';
        }

        //fechas
        $fecha_salida = $request->fecha_salida . " " . $request->hora_salida;
        $fecha_entrada = $request->fecha_entrada . " " . $request->hora_entrada;

        $post = array(
            'n_boleta' => $n_boleta,
            'batallon' => $request->batallon,
            'user_id' => $id_user,
            'nombre_soldado' => $nombres,
            'cedula_soldado' => $cedula,
            'telefono_soldado' => $telefono,
            'fecha_salida' => $fecha_salida,
            'fecha_entrada' => $fecha_entrada,
            'guarnicion' => $guarnicion,
            'destino' => $request->destino,
            'motivo' => $request->motivo
        );

        if($data = Permisos::create($post)){

            $id = $data->id;

            $updated = array(
                'pdf' => "permiso_n_{$id}.pdf"
            );

            Permisos::findOrFail($id)->update($updated);

            $data_pdf = compact('data');
            $pdf = PDF::loadView('pdf.permiso', $data_pdf)->setPaper('a4', 'landscape');
            $pdf->save(storage_path('app/public/permisos/') . "permiso_n_{$id}.pdf");
            //return $pdf->stream("permiso_n_{$id}.pdf");

            session()->flash('error', 'success');
            return redirect()->route('permisos');
        } else {
            session()->flash('error', 'failure');
            return redirect()->route('permisos');
        }

    }
}
