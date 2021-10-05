<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archives_groups;
use Illuminate\Support\Facades\DB;

class SIS_RADFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDeteccionFacial(Request $request)
    {
        if(isset($request->fecha_inicial)){
            $archives = Archives_groups::whereBetween('created_at', [$request->fecha_inicial, $request->fecha_final])
                        ->where('type', 'image')
                        ->get();
            return view('pages.sisradf.deteccionFacial.index', compact('archives'));
        }else{
            return view('pages.sisradf.deteccionFacial.index');
        }
    }

    public function indexHistorialFacial()
    {
        $archives = DB::table('archives_groups')->where('type', 'image')->simplePaginate(4); //Archives_groups::all()->paginate(4);
        return view('pages.sisradf.deteccionFacial.indexHistory', compact('archives'));
    }

    public function indexDeteccionMovimiento(Request $request)
    {
        if(isset($request->fecha_inicial)){
            $archives = Archives_groups::whereBetween('created_at', [$request->fecha_inicial, $request->fecha_final])
                        ->where('type', 'video')
                        ->get();
            return view('pages.sisradf.deteccionMovimiento.index', compact('archives'));
        }else{
            return view('pages.sisradf.deteccionMovimiento.index');
        }
    }

    public function indexHistorialMovimiento()
    {
        $archives = DB::table('archives_groups')->where('type', 'video')->simplePaginate(16); //Archives_groups::all()->paginate(4);
        return view('pages.sisradf.deteccionMovimiento.indexHistory', compact('archives'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
