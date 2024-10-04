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
    $sentenciasModel = new SentenciasModel(); // Añadir esto para obtener las sentencias
    $data['sentencias'] = $sentenciasModel->where('Is_Activo', 1)->findAll();
    $data['juzgadores'] = $juzgadorModel->where('Is_Activo', 1)->findAll();
    // Aquí debes cargar las entidades antes de pasar los datos a la vista
    $db = \Config\Database::connect('sqlsrv');
    $sql = "EXEC uspEntidad @intOperacion = ?";
    $query = $db->query($sql, [1]);

    $entidades = $query->getResult();

    // Asegúrate de pasar la variable entidades a la vista
    $data['entidades'] = $entidades;
    $data['juzgadores'] = $this->getJuzgadoresActivos(); // Supongamos que esta es una función que obtiene los juzgadores activos
    return view('sentencias/new', $data);
  }
  private function getJuzgadoresActivos()
  {
    // Ejemplo para obtener los juzgadores activos
    $juzgadorModel = new \App\Models\JuzgadorModel();
    return $juzgadorModel->where('Is_Activo', 1)->findAll();
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
      'Is_Activo' => 1,
      'idEntidadFederativa' => $this->request->getPost('entidad_id')
    ];

    $sentenciasModel->save($sentenciaData);

    return redirect()->to('/sentencias');
  }


  public function search()
  {
    $sentenciasModel = new SentenciasModel();
    $juzgadorModel = new JuzgadorModel();

    $NumExpediente = $this->request->getPost('NumExpediente');
    $NumAno = $this->request->getPost('NumAno');
    $Juzgador_idJuzgador = $this->request->getPost('Juzgador_idJuzgador');

    // Filtros de búsqueda
    $query = $sentenciasModel->where('Is_Activo', 1);

    if (!empty($NumExpediente)) {
      $query->like('NumExpediente', $NumExpediente);
    }

    if (!empty($NumAno)) {
      $query->where('NumAno', $NumAno);
    }

    if (!empty($Juzgador_idJuzgador)) {
      $query->where('Juzgador_idJuzgador', $Juzgador_idJuzgador);
    }

    $data['resultados'] = $query->findAll();
    $data['juzgadores'] = $juzgadorModel->where('Is_Activo', 1)->findAll();

    return view('sentencias/index', $data);
  }
  public function advancedSearch()
  {
    $sentenciasModel = new SentenciasModel();
    $juzgadorModel = new JuzgadorModel();

    // Capturar parámetros de búsqueda avanzada
    $NumExpediente = $this->request->getPost('NumExpediente');
    $NumAno = $this->request->getPost('NumAno');
    $Juzgador_idJuzgador = $this->request->getPost('Juzgador_idJuzgador');
    $StrCaracteristicasEspeciales = $this->request->getPost('StrCaracteristicasEspeciales');

    // Construir la consulta avanzada
    $query = $sentenciasModel->where('Is_Activo', 1);

    if (!empty($NumExpediente)) {
      $query->like('NumExpediente', $NumExpediente);
    }

    if (!empty($NumAno)) {
      $query->where('NumAno', $NumAno);
    }

    if (!empty($Juzgador_idJuzgador)) {
      $query->where('Juzgador_idJuzgador', $Juzgador_idJuzgador);
    }

    if (!empty($StrCaracteristicasEspeciales)) {
      $query->like('StrCaracteristicasEspeciales', $StrCaracteristicasEspeciales);
    }

    // Obtener los resultados
    $data['resultados'] = $query->findAll();
    $data['juzgadores'] = $juzgadorModel->where('Is_Activo', 1)->findAll();

    // Cargar la vista con los resultados de la búsqueda avanzada
    return view('sentencias/advanced_search', $data);
  }
}
