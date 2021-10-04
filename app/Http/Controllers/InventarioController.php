<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Models\HistorialInventario;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAlmacen()
    {
        $productos = Inventario::where('categoria_inventario_id', 1)->get();
        return view('pages.inventario.indexAlmacen', compact('productos'));
    }

    public function indexArmamento()
    {
        $productos = Inventario::where('categoria_inventario_id', 2)->get();
        return view('pages.inventario.indexArmamento', compact('productos'));
    }

    public function indexAlimentos()
    {
        $productos = Inventario::where('categoria_inventario_id', 3)->get();
        return view('pages.inventario.indexAlimentos', compact('productos'));
    }

    public function indexInsumos()
    {
        $productos = Inventario::where('categoria_inventario_id', 4)->get();
        return view('pages.inventario.indexInsumos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAlimentos()
    {
        //return view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateCurrently = Carbon::now();
        $idInventario = Inventario::create([
            'categoria_inventario_id' => intval($request->categoria_inventario_id),
            'nombre' => $request->nombre,
            'stock_currently' => $request->stock,
            'descripcion' => $request->descripcion,
            'estado' => 1,
            'created_at' => $dateCurrently,
            'updated_at' => null
        ])->id;


        $response = HistorialInventario::create([
            'inventario_id' => $idInventario,
            'cantidad_agregada' => $request->stock,
            'cantidad_eliminada' => 0,
            'stock_registrado' => $request->stock,
            'created_at' => $dateCurrently,
            'updated_at' => null
        ]);
        if($response){
            session()->flash('error', 'success');
            return redirect()->route($request->route_name);
        } else {
            session()->flash('error', 'failure');
            return redirect()->route($request->route_name);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        return view('pages.inventario.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $inventario->nombre = $request->nombre;
        $inventario->stock_currently = $request->stock;
        $inventario->descripcion = $request->descripcion;
        $response = $inventario->update();

        if($response){
            session()->flash('error', 'success_updated');
            return redirect()->route($request->route_name);
        } else {
            session()->flash('error', 'failure');
            return redirect()->route($request->route_name);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario, Request $request)
    {
        $id = $request->idUser;

        HistorialInventario::where('inventario_id', $id)->delete();

        if(Inventario::findOrFail($id)->delete()){
            session()->flash('error', 'delete');
            return redirect()->route($request->route_name);
        } else {
            session()->flash('error', 'failure');
            return redirect()->route($request->route_name);
        }
    }


    public function indexHistory(Inventario $inventario)
    {
        $historiales = HistorialInventario::where('inventario_id', $inventario->id)->get();
        return view('pages.inventario.history.index', compact('inventario', 'historiales'));
    }

    public function storeHistory(Inventario $inventario, Request $request)
    {
        $historiales = HistorialInventario::where('inventario_id', $inventario->id)->get();
        $lastPossition = count($historiales) - 1;
        $ultimoHistorial = $historiales[$lastPossition];

        $response = HistorialInventario::create([
            'inventario_id' => $inventario->id,
            'cantidad_agregada' => $request->cantidad_agregada,
            'cantidad_eliminada' => $request->cantidad_eliminada,
            'stock_registrado' => $ultimoHistorial->stock_registrado + $request->cantidad_agregada - $request->cantidad_eliminada,
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

        $inventario->stock_currently =  $ultimoHistorial->stock_registrado + $request->cantidad_agregada - $request->cantidad_eliminada;
        $inventario->update();
        session()->flash('error', 'success');
            return redirect()->route('inventarioHistory.index', ['inventario' => $inventario]);
    }
}
