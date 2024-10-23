<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\PerfilModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        $perfilModel = new PerfilModel();
        $data['perfil'] = $perfilModel->findAll();

        return view('auth/register', $data);
    }

    public function createUser()
    {
        $model = new UsuarioModel();

        $data = [
            'fkPerfil' => $this->request->getPost('fkPerfil'),
            'StrUsuario' => $this->request->getPost('usuario'),
            'StrPassword' => $this->request->getPost('password'),
            'StrNombre' => $this->request->getPost('nombre'),
            'StrApellidoPaterno' => $this->request->getPost('apellido_paterno'),
            'StrApellidoMaterno' => $this->request->getPost('apellido_materno'),
            'is_activo' => 1,
            'Dtmfecha_creacion' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);
        return redirect()->to('/');
    }

    public function mostrarFormularioRegistro()
    {
        $perfilModel = new PerfilModel();
        $perfil = $perfilModel->findAll();

        return view('auth/register', ['perfil' => $perfil]);
    }
}
