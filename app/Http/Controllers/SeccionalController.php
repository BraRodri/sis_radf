<?php

namespace App\Http\Controllers;

use App\Models\Batallones_users;
use Illuminate\Http\Request;
use App\Models\Brigada_users;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SeccionalController extends Controller
{
    //
    public function brigada()
    {
        return view('pages.seccional.brigada');
    }

    public function batallones()
    {
        return view('pages.seccional.batallones');
    }

    public function createBrigada(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brigada_id' => 'required',
            'user_id' => 'required',
        ]);

        if($validator->fails()){
            session()->flash('error', 'failure');
            return redirect()->route('seccional.brigada');
        }else{

            $validar = Brigada_users::where('brigada_id', $request->brigada_id)->where('user_id', $request->user_id)->get()->count();
            if ($validar > 0) {
                session()->flash('error', 'failure_exist');
                return redirect()->route('seccional.brigada');
            } else {

                $data = array(
                    'brigada_id' => $request->brigada_id,
                    'user_id' => $request->user_id,
                    'active' => 1
                );

                if(Brigada_users::create($data)){
                    session()->flash('error', 'success');
                    return redirect()->route('seccional.brigada');
                } else {
                    session()->flash('error', 'failure');
                    return redirect()->route('seccional.brigada');
                }

            }

        }
    }

    public function deleteBrigada($id)
    {
        if ($delete = Brigada_users::findOrFail($id)->delete()) {
            session()->flash('error', 'delete');
            return redirect()->route('seccional.brigada');
        } else {
            session()->flash('error', 'failure');
            return redirect()->route('seccional.brigada');
        }
    }

    public function createBatallon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'batallon_id' => 'required',
            'user_id' => 'required',
        ]);

        if($validator->fails()){
            session()->flash('error', 'failure');
            return redirect()->route('seccional.batallones');
        }else{

            $validar = Batallones_users::where('batallon_id', $request->batallon_id)->where('user_id', $request->user_id)->get()->count();
            if ($validar > 0) {
                session()->flash('error', 'failure_exist');
                return redirect()->route('seccional.batallones');
            } else {

                $data = array(
                    'batallon_id' => $request->batallon_id,
                    'user_id' => $request->user_id,
                    'active' => 1
                );

                if(Batallones_users::create($data)){
                    session()->flash('error', 'success');
                    return redirect()->route('seccional.batallones');
                } else {
                    session()->flash('error', 'failure');
                    return redirect()->route('seccional.batallones');
                }

            }

        }
    }

    public function deleteBatallon($id)
    {
        if ($delete = Batallones_users::findOrFail($id)->delete()) {
            session()->flash('error', 'delete');
            return redirect()->route('seccional.batallones');
        } else {
            session()->flash('error', 'failure');
            return redirect()->route('seccional.batallones');
        }
    }

}
