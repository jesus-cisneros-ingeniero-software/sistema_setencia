<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use function PHPUnit\Framework\returnArgument;

class Home extends BaseController
{
    private $miUsuarioModel;

    public function __construct()
    {
        $this->miUsuarioModel = new UsuarioModel();
    }

    public function login()
    {
        return view('Login');
    }

    public function autenticar()
    {
        $usuario = $this->request->getPost('usuario'); //son los valores del campo formulario
        $password = trim($this->request->getPost('password')); //valor del campo formulario

        try {
            $buscar = $this->miUsuarioModel->where('StrUsuario', $usuario)->first();
            #log_message('debug', '; Contraseña verificada para el usuario ' . json_encode($buscar));

            if ($buscar) {
                if ($password == $buscar->StrPassword) {
                    log_message('debug','; Contraseña verificada para el usuario'. $usuario);

                session()->set([
                    'isLoggedIn' => true,
                    'idUsuario' => $buscar->idUsuario,
                    'nombre_usuario' => $buscar->StrUsuario,
                    'perfil_usuario' => $buscar->fkPerfil,
                ]);

                $info = [
                    'id' => $buscar->idUsuario,
                    'nombre' => $buscar->StrUsuario,
                ];

                log_message('info', '; El usuario {id} como {nombre} ha iniciado sesion ', $info);

               if($buscar->fkPerfil == 1){
                   return redirect()->to('/sentencias/agregar');
               }elseif($buscar->fkPerfil == 2){
                   return redirect()->to(base_url('/sentencias/agregar'));
               }else{
                   return redirect()->to(base_url('/'))->with('error','Rol no permitido');
               }
                #return redirect()->to('/sentencias/agregar');
            } else {
                    log_message('error', '; Contraseña incorrecta para el usuario' . $usuario);
                    return redirect()->to(base_url('/'))->with('error', 'Contraseña incorrecta');
                }
            } else {
                log_message('error', '; Usuario incorrecto: ' . $usuario);
                return redirect()->to(base_url('/'))->with('error', 'Usuario no encontrado');
            }
        }catch (\Exception $e){

            log_message('error','; Error al iniciar session para el usuario ' . $usuario . ': ' . $e->getMessage());
        }

    }


    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return view('pdfs/upload');
        } else {
            return redirect()->to('/');
        }
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
