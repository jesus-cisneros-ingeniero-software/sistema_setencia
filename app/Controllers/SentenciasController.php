<?php

namespace App\Controllers;

use App\Models\SentenciasModel;
use App\Models\JuzgadorModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class SentenciasController extends Controller
{
  public function index()
  {

    $sentenciasModel = new SentenciasModel();
    $juzgadorModel = new JuzgadorModel();
    $usuarioModel = new UsuarioModel();


    $data['sentencias'] = $sentenciasModel->findAll();
    $data['juzgadores'] = $juzgadorModel->where('Is_Activo', 1)->findAll();
    $data['usuarios'] = $usuarioModel->findAll();

    return view('sentencias/index', $data);
  }

  public function agregar()
  {
    $juzgadorModel = new JuzgadorModel();
    $data['juzgadores'] = $juzgadorModel->where('Is_Activo', 1)->findAll();
    return view('sentencias/new', $data);
  }


  public function save()
  {
    $sentenciasModel = new SentenciasModel();
    $juzgadorModel = new JuzgadorModel();
    $usuarioModel = new UsuarioModel();

    $juzgadorId = $this->request->getPost('Juzgador_idJuzgador');
    $juzgadorNombre = $this->request->getPost('StrNombre');
    //$fkUsuario_idUsuario = $this->request->getPost('StrUsuario');
    //StrUsuario
    // Verifica si el juzgador existe
    if ($juzgadorNombre && !$juzgadorId) {
      $juzgadorExistente = $juzgadorModel->where('StrNombre', $juzgadorNombre)->first();

      // Si no existe, crearlo
      if (!$juzgadorExistente) {
        $juzgadorData = [
          'StrNombre' => $this->request->getPost('StrNombre'),
          'StrApellidoPaterno' => $this->request->getPost('StrApellidoPaterno'),
          'StrApellidoMaterno' => $this->request->getPost('StrApellidoMaterno'),
          'Is_Activo' => 1
        ];
        $juzgadorId = $juzgadorModel->insert($juzgadorData);
      } else {
        $juzgadorId = $juzgadorExistente['idJuzgador'];
      }
    }

    // Guardar la sentencia
    $sentenciaData = [
      'fkUsuario_idUsuario' => 1,
      'Juzgador_idJuzgador' => $juzgadorId,
      'NumExpediente' => $this->request->getPost('NumExpediente'),
      'NumAno' => $this->request->getPost('NumAno'),
      'StrResumen' => $this->request->getPost('StrResumen'),
      'StrCaracteristicasEspeciales' => $this->request->getPost('StrCaracteristicasEspeciales'),
      'LITIS' => $this->request->getPost('LITIS'),
      'DtmFecha_Creacion' => date('Y-m-d H:i:s'),
      'Is_Activo' => 1
    ];

    $sentenciasModel->save($sentenciaData);

    return redirect()->to('/sentencias');
  }
}
