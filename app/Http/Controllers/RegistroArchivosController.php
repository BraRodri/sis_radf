<?php

namespace App\Http\Controllers;

use App\Models\Archives;
use Illuminate\Http\Request;
use App\Models\Archives_groups;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use facedetection\FaceDetector\FaceDetector;
use Illuminate\Support\Str;

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

        $typeFileFormat = $request->file('image')->getClientMimeType();
        $typeFile = explode("/", $typeFileFormat);
        $name_image = $request->file('image')->getClientOriginalName();

        $image = $request->file('image')->store('public/archivos');
        $url = Storage::url($image);
        //echo json_encode($image);
        if($typeFile[0] === 'image'){

            //$nameStorage = Str::uuid()->toString();
            //$url = "/storage/archivos/". $nameStorage . '.jpeg';
            $path = explode('/', $image);
            $nombreAndFormat = explode('.', $path[2]);
            $detector = new FaceDetector('detection.dat');
            $detector->faceDetect($request->file('image'), $typeFile[1]);
            $detector->toJpeg($nombreAndFormat[0]);
        }

        echo json_encode(array('imagen' => $url, 'type' => 'success', 'name' => $name_image, 'typeFile' => $typeFile[0]));
/*
        if($request->file('image')){
            $image = $request->file('image')->store('public/archivos');
            $url = Storage::url($image);
            $name_image = $request->file('image')->getClientOriginalName();
            $typeFileFormat = $request->file('image')->getClientMimeType();
            $typeFile = explode("/", $typeFileFormat);
            $type = 'success';
        } else {
            $type = 'failure';
        }
        echo json_encode(array('imagen' => $url, 'type' => $type, 'name' => $name_image, 'typeFile' => $typeFile[0] ));*/
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
                        'active' => 1,
                        'type' => $request->typeArchivos[$i]
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

    public function prueba(Request $request)
    {
        dd($request);
    }
}
