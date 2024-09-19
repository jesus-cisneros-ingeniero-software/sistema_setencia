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

    // Depuración
    /*
    echo '<pre>';
    print_r($data['perfil']);
    echo '</pre>';
    exit;
    */
    return view('auth/register', $data);
  }

  public function createUser()
  {
    $model = new UsuarioModel();

    $data = [
      'StrUsuario' => $this->request->getPost('usuario'),
      'StrPassword' => $this->request->getPost('password'),
      'StrNombre' => $this->request->getPost('nombre'),
      'StrApellidoPaterno' => $this->request->getPost('apellido_paterno'),
      'StrApellidoMaterno' => $this->request->getPost('apellido_materno'),
      'fkPerfil' => $this->request->getPost('fkPerfil'), // Se asegura de tomar el perfil seleccionado
      'is_activo' => 1, // Usuario activo por defecto
      'Dtmfecha_creacion' => date('Y-m-d H:i:s') // Fecha actual
    ];

    $model->insert($data);
    return redirect()->to('/');
  }


  public function mostrarFormularioRegistro()
  {
    $perfilModel = new PerfilModel(); // Cargamos el modelo de perfiles
    $perfil = $perfilModel->findAll(); // Obtener todos los perfiles

    return view('auth/register', ['perfil' => $perfil]); // Pasa los perfiles a la vista
  }
}
