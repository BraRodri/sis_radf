<?php

namespace App\Http\Controllers;

use App\Models\Batallones_users;
use App\Models\Brigada_users;
use App\Models\Guardia;
use App\Models\Permisos;
use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    // datos
    private $grados = [
        'Oficial' => 'Oficial',
        'Suboficial' => 'Suboficial',
        'Soldado' => 'Soldado',
        'Otros' => 'Otros'
    ];

    private $distintivos = [
        'Subteniente' => 'Subteniente',
        'Teniente' => 'Teniente',
        'Capitan' => 'Capitan',
        'Mayor' => 'Mayor',
        'Teniente coronel' => 'Teniente coronel',
        'Coronel' => 'Coronel',
        'Brigadier General' => 'Brigadier General',
        'Mayor General' => 'Mayor General',
        'General' => 'General',
        'Cabo Tercero' => 'Cabo Tercero',
        'Cabo Segundo' => 'Cabo Segundo',
        'Cabo Primero' => 'Cabo Primero',
        'Sargento Segundo' => 'Sargento Segundo',
        'Sargento Viceprimero' => 'Sargento Viceprimero',
        'Sargento Primero' => 'Sargento Primero',
        'Sargento Mayor' => 'Sargento Mayor',
        'Sargento Mayor De Comando' => 'Sargento Mayor De Comando',
        'Sargento Mayor De Comando Conjunto' => 'Sargento Mayor De Comando Conjunto',
        'Soldado Profesional' => 'Soldado Profesional',
        'Soldado Bachiller' => 'Soldado Bachiller',
        'Administrativo No Militar' => 'Administrativo No Militar',
        'Servicios Generales' => 'Servicios Generales'
    ];

    private $armas = [
        "Infantería 'paso de vencedores'" => "Infantería 'paso de vencedores'",
        "Artillería 'deber antes que vida'" => "Artillería 'deber antes que vida'",
        "Comunicaciones 'ciencia dominio y vigilancia'" => "Comunicaciones 'ciencia dominio y vigilancia'",
        "Aviación 'gloria sobre el horizonte'" => "Aviación 'gloria sobre el horizonte'",
        "Caballería 'salve usted la patria'" => "Caballería 'salve usted la patria'",
        "Ingenieros 'vencer o morir'" => "Ingenieros 'vencer o morir'",
        "Inteligencia 'en guardia por la patria'" => "Inteligencia 'en guardia por la patria'",
        "Administrativos 'íntegros y valientes'" => "Administrativos 'íntegros y valientes'",
        "Ninguno" => "Ninguno"
    ];

    private $brigadas = [
        "TRIGESIMA BRIGADA N° 30 CUCUTA DIV02" => "TRIGESIMA BRIGADA N° 30 CUCUTA DIV02",
        "BIROV BATALLON DE INFANTERIA N°13 'GR. CUSTODIO GARCIA ROVIRA" => "BIROV BATALLON DE INFANTERIA N°13 'GR. CUSTODIO GARCIA ROVIRA",
        "GMMAZ GRUPO DE CABALLERIA MECANIZADO N° 5 'GR. HERMOGENES MAZA" => "GMMAZ GRUPO DE CABALLERIA MECANIZADO N° 5 'GR. HERMOGENES MAZA",
        "BAS30 BATALLON DE SERVICIOS N° 30" => "BAS30 BATALLON DE SERVICIOS N° 30",
        "BISAN BATALLON DE INFANTERIA N° 15 FRANCISCO DE PAULA SANTANDER" => "BISAN BATALLON DE INFANTERIA N° 15 FRANCISCO DE PAULA SANTANDER",
        "BIJOS BATALLON DE INGENIEROS N° 30 CORONEL JOSE ALBERTO SALAZAR A" => "BIJOS BATALLON DE INGENIEROS N° 30 CORONEL JOSE ALBERTO SALAZAR A",
        "BACUC BATALLON DE ARTILLERIA N° 30 BATALLA DE CUCUTA" => "BACUC BATALLON DE ARTILLERIA N° 30 BATALLA DE CUCUTA",
        "BITER30 BATALLON DE INSTRUCCION ENTRENAMIENTO Y REENTRENAMIENTO N° 30" => "BITER30 BATALLON DE INSTRUCCION ENTRENAMIENTO Y REENTRENAMIENTO N° 30",
        "GGNSA GRUPO DE ACCION UNIFICADA POR LA LIBERTAD PERSONAL NORTE DE SANTANDER" => "GGNSA GRUPO DE ACCION UNIFICADA POR LA LIBERTAD PERSONAL NORTE DE SANTANDER",
        "CIAME - FUNDACIAME" => "CIAME - FUNDACIAME"
    ];

    private $estados = [
        'Activo' => 'Activo',
        'Suspendido' => 'Suspendido',
        'Retirado' => 'Retirado',
        'Reserva' => 'Reserva',
    ];

    private $roles = [
        '1' => 'Administrador',
        '2' => 'Director',
        '3' => 'Asistencial',
        '4' => 'No Aplica'
    ];

    public function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('updated_at', 'DESC')->get();
        return view('pages.usuarios.index')
            ->with('users', $users);
    }

    public function create(Request $request)
    {
        if($request->route_name === "recepcion"){
            $validar_documento = User::where('document', $request->documento)->get()->count();
            if($validar_documento > 0){
                session()->flash('errorUser', 'failure_document');
                return redirect()->route('recepcion');
            } else {
                $validar_correo = User::where('email', $request->correo_personal)->get()->count();
                if($validar_correo > 0){
                    session()->flash('errorUser', 'failure_email');
                    return redirect()->route('recepcion');
                } else {

                    $datos = array(
                        'document' => $request->documento,
                        'names' => $request->nombres,
                        'grado' => $request->grado,
                        'distintivo' => $request->distintivo,
                        'arma' => $request->arma,
                        'brigada' => $request->brigada,
                        'email' => $request->correo_personal,
                        'email_corporativo' => $request->correo_corporativo,
                        'estado' => $request->estado,
                        'rol'  => $request->rol
                    );

                    $rol = $request->rol;

                    if($rol == 4){
                        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $datos['password'] = bcrypt(self::generate_string($permitted_chars, 20));
                    } else {
                        $datos['password'] = bcrypt($request->password);
                    }

                    if(User::create($datos)){
                        $user = User::where('document', $request->documento)->first();
                        return view('pages.recepcion.index', compact('user'));

                        //session()->flash('error', 'success');
                        //return redirect()->route('usuarios');
                    } else {
                        session()->flash('errorUser', 'failure');
                        return redirect()->route('recepcion');
                    }

                }
            }
        }else if($request->route_name === "usuarios"){
            $validar_documento = User::where('document', $request->documento)->get()->count();
            if($validar_documento > 0){
                session()->flash('error', 'failure_document');
                return redirect()->route('usuarios');
            } else {
                $validar_correo = User::where('email', $request->correo_personal)->get()->count();
                if($validar_correo > 0){
                    session()->flash('error', 'failure_email');
                    return redirect()->route('usuarios');
                } else {

                    $datos = array(
                        'document' => $request->documento,
                        'names' => $request->nombres,
                        'grado' => $request->grado,
                        'distintivo' => $request->distintivo,
                        'arma' => $request->arma,
                        'brigada' => $request->brigada,
                        'email' => $request->correo_personal,
                        'email_corporativo' => $request->correo_corporativo,
                        'estado' => $request->estado,
                        'rol'  => $request->rol
                    );

                    $rol = $request->rol;

                    if($rol == 4){
                        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $datos['password'] = bcrypt(self::generate_string($permitted_chars, 20));
                    } else {
                        $datos['password'] = bcrypt($request->password);
                    }

                    if(User::create($datos)){
                        session()->flash('error', 'success');
                        return redirect()->route('usuarios');
                    } else {
                        session()->flash('error', 'failure');
                        return redirect()->route('usuarios');
                    }

                }
            }
        }
        $validar_documento = User::where('document', $request->documento)->get()->count();
        if($validar_documento > 0){
            session()->flash('error', 'failure_document');
            return redirect()->route('usuarios');
        } else {
            $validar_correo = User::where('email', $request->correo_personal)->get()->count();
            if($validar_correo > 0){
                session()->flash('error', 'failure_email');
                return redirect()->route('usuarios');
            } else {

                $datos = array(
                    'document' => $request->documento,
                    'names' => $request->nombres,
                    'grado' => $request->grado,
                    'distintivo' => $request->distintivo,
                    'arma' => $request->arma,
                    'brigada' => $request->brigada,
                    'email' => $request->correo_personal,
                    'email_corporativo' => $request->correo_corporativo,
                    'estado' => $request->estado,
                    'rol'  => $request->rol
                );

                $rol = $request->rol;

                if($rol == 4){
                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $datos['password'] = bcrypt(self::generate_string($permitted_chars, 20));
                } else {
                    $datos['password'] = bcrypt($request->password);
                }

                if(User::create($datos)){
                    session()->flash('error', 'success');
                    return redirect()->route('usuarios');
                } else {
                    session()->flash('error', 'failure');
                    return redirect()->route('usuarios');
                }

            }
        }
    }

    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('pages.usuarios.edit')
            ->with('user', $user)
            ->with('grados', $this->grados)
            ->with('distintivos', $this->distintivos)
            ->with('armas', $this->armas)
            ->with('brigadas', $this->brigadas)
            ->with('estados', $this->estados)
            ->with('roles', $this->roles);
    }

    public function updated(Request $request)
    {
        $id = $request->idUser;
        $users = User::where('document', $request->documento)->where('email', $request->correo_personal)->where('id', '<>', $id)->get()->count();
        if($users > 0){
            session()->flash('error', 'duplicate');
            return redirect()->route('usuarios.view', $id);
        } else {

            $password = $request->password;

            $datos = array(
                'document' => $request->documento,
                'names' => $request->nombres,
                'grado' => $request->grado,
                'distintivo' => $request->distintivo,
                'arma' => $request->arma,
                'brigada' => $request->brigada,
                'email' => $request->correo_personal,
                'email_corporativo' => $request->correo_corporativo,
                'estado' => $request->estado,
                'rol'  => $request->rol
            );

            if(!empty($password)){
                $datos['password'] = bcrypt($password);
            }

            if(User::findOrFail($id)->update($datos)){
                session()->flash('error', 'success_updated');
                return redirect()->route('usuarios');
            } else {
                session()->flash('error', 'failure');
                return redirect()->route('usuarios.view', $id);
            }

        }
    }

    public function delete(Request $request)
    {
        $id = $request->idUser;

        Batallones_users::where('user_id', $id)->delete();
        Brigada_users::where('user_id', $id)->delete();
        Guardia::where('user_id', $id)->delete();
        Permisos::where('user_id', $id)->delete();

        if(User::findOrFail($id)->delete()){
            session()->flash('error', 'delete');
            return redirect()->route('usuarios');
        } else {
            session()->flash('error', 'failure');
            return redirect()->route('usuarios');
        }
    }
}
