<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Recepcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecepcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->documento)){
            $recepcionPreview = Recepcion::where('documento_user', $request->documento)->where('updated_at', null)->with('user')->first();
            if($recepcionPreview === null){
                $user = User::where('document', $request->documento)->first();
                if($user){
                    return view('pages.recepcion.index', compact('user'));
                }else{
                    $user = 'null';
                    return view('pages.recepcion.index', compact('user'));
                }
            }else{
                return view('pages.recepcion.index')->with('recepcionPreview', $recepcionPreview);
            };
        }else{
            return view('pages.recepcion.index');
        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Recepcion::create([
            'user_id' => $request->id,
            'documento_user' => $request->documento,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => null,
            'motivo_ingreso' => $request->motivo_ingreso,
            'motivo_egreso' => null,
            'imagen' => "tla",
            'created_at' => Carbon::now('America/Bogota'),
            'updated_at' => null
        ]);

        if($response){
            session()->flash('error', 'success');
            return redirect()->route('recepcion');
        } else {
            session()->flash('error', 'failure');
            return redirect()->route('recepcion');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recepcion  $recepcion
     * @return \Illuminate\Http\Response
     */
    public function show(Recepcion $recepcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recepcion  $recepcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Recepcion $recepcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recepcion  $recepcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recepcion $recepcion)
    {
        $recepcion->hora_salida = $request->hora_salida;
        $recepcion->motivo_egreso = $request->motivo_egreso;
        $recepcion->updated_at = Carbon::now('America/Bogota');
        if($recepcion->update()){
            session()->flash('error', 'success_updated');
            return redirect()->route('recepcion');
        } else {
            session()->flash('error', 'failure');
            return redirect()->route('recepcion');
        }
    }

    public function historyCountReception()
    {
        $historiales = DB::table('recepcion')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as visits'))
        ->groupBy('created_at')
        ->get();

        return view('pages.recepcion.indexCountHistory', compact('historiales'));
    }

    public function historyListReception($date)
    {
        $historiales = Recepcion::where('created_at', $date)->get();
        return view('pages.recepcion.indexListHistory', compact('historiales', 'date'));
    }

    public function historyDetailsReception(Recepcion $recepcion)
    {
        return view('pages.recepcion.indexDetailsHistory', compact('recepcion'));
    }
}
