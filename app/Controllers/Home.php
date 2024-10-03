<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

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

        $buscar = $this->miUsuarioModel->where('StrUsuario', $usuario)->first();

        if ($buscar) {
            if ($password == $buscar->StrPassword) {

                session()->set([
                    'isLoggedIn' => true,
                    'nombre_usuario' => $buscar->StrUsuario,
                    'perfil_usuario' => $buscar->fkPerfil,
                ]);
                return redirect()->to('/sentencias/agregar');
            } else {
                return redirect()->to(base_url('/'))->with('error', 'Contraseña incorrecta');
            }
        } else {
            return redirect()->to(base_url('/'))->with('error', 'Usuario no encontrado');
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
