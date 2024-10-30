<?php
namespace App\Controllers;
use App\Models\SentenciasModel;
use App\Models\JuzgadorModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use App\Models\PDFModel;
class SentenciasController extends Controller
{
    protected $session;
    protected $sentenciasModel;
    protected $juzgadorModel;
    protected $usuarioModel;
    protected $pdfModel;

    public function __construct()
    {
        $this->session = session(); // Cargar el servicio de sesión
        $this->sentenciasModel = new SentenciasModel();
        $this->juzgadorModel = new JuzgadorModel();
        $this->usuarioModel = new UsuarioModel();
        $this->pdfModel = new PDFModel();
    }
  public function index()
  {

   /* $sentenciasModel = new SentenciasModel();
    $juzgadorModel = new JuzgadorModel();
    $usuarioModel = new UsuarioModel();*/


    $data['sentencias'] = $this->sentenciasModel
        ->orderBy('DtmFecha_Creacion','DESC')->findAll();
    $data['juzgadores'] = $this->juzgadorModel->where('Is_Activo', 1)->findAll();
    $data['usuarios'] = $this->usuarioModel->findAll();
    $data['pdfs'] = $this->pdfModel->findAll();

      //Depuración: Verificar los datos de las sentencias

      /*echo '<pre>';
      print_r($data['sentencias']);
      echo '</pre>';
      exit;*/

    foreach ($data['sentencias'] as &$sentencia){
        #$sentencia['juzgador'] = $this->sentenciasModel->find($sentencia['Juzgador_idJuzgador']);
        $sentencia['juzgador'] = $this->juzgadorModel->find($sentencia['Juzgador_idJuzgador']);
        $sentencia['entidad'] = $this->getEntidad($sentencia['entidad_id']);
    }

   return view('sentencias/index', $data);
  }

    public function getEntidad($entidadId)
    {
        $db = \Config\Database::connect('sqlsrv');
        $sql = "EXEC uspEntidad @intOperacion = ?, @strEntFedId = ?";
        $query = $db->query($sql, [1, $entidadId]);

        // Filtrar el resultado para encontrar la entidad específica
        $entidades = $query->getResultArray();
        foreach ($entidades as $entidad) {
            if (isset($entidad['strEntFedId']) && $entidad['strEntFedId'] == $entidadId) {
                return $entidad['strEntidad'];

            }
        }

        return 'Entidad no encontrada';
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
        $pdfModel = new PDFModel();

        // Validación del formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'NumExpediente' => 'required',
            'NumAno' => 'required|numeric',
            'StrResumen' => 'required',
            'StrCaracteristicasEspeciales' => 'permit_empty',
            'LITIS' => 'permit_empty',
            'entidad_id' => 'required|numeric',
            'Juzgador_idJuzgador' => 'permit_empty|numeric',
            'StrNombre' => 'permit_empty',
            'StrApellidoPaterno' => 'permit_empty',
            'StrApellidoMaterno' => 'permit_empty',
            'unidadadministartiva'=> 'required',
            'areaadministrativa'=> 'required',
            'tribunal' => 'required'

        ]);

        if (!$validation->withRequest($this->request)->run()) {
            log_message('error', 'Error en validación: ' . json_encode($validation->getErrors()));
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        log_message('info', 'Validación exitosa, guardando sentencia.');

        $sentenciaData = [
            'fkUsuario_idUsuario' => 1,
            'Juzgador_idJuzgador' => $this->request->getPost('Juzgador_idJuzgador'),
            'NumExpediente' => $this->request->getPost('NumExpediente'),
            'NumAno' => $this->request->getPost('NumAno'),
            'StrResumen' => $this->request->getPost('StrResumen'),
            'StrCaracteristicasEspeciales' => $this->request->getPost('StrCaracteristicasEspeciales'),
            'LITIS' => $this->request->getPost('LITIS'),
            'DtmFecha_Creacion' => date('Y-m-d H:i:s'),
            'Is_Activo' => 1,
            'entidad_id' => $this->request->getPost('entidad_id'),
            'unidadadministartiva' => $this->request->getPost('unidadadministartiva'), // Debe ser un número
            'areaadministrativa' => $this->request->getPost('areaadministrativa'),      // Cadena válida
            'tribunal' => $this->request->getPost('tribunal')

        ];

        if ($sentenciasModel->save($sentenciaData)) {
            $sentenciaId = $sentenciasModel->insertID();
            log_message('info', "Sentencia guardada con ID: {$sentenciaId}");

            // Guardar el archivo PDF
            $pdfFile = $this->request->getFile('pdf_file');
            if ($pdfFile && $pdfFile->isValid() && !$pdfFile->hasMoved()) {
                $newFileName = $sentenciaId . '.pdf';  // Usar el ID de la sentencia como nombre de archivo
                $pdfFile->move(WRITEPATH . 'uploads', $newFileName);

                $pdfData = [
                    'file_name' => $newFileName,
                    'file_path' => WRITEPATH . 'uploads/' . $newFileName,
                    'created_at' => date('Y-m-d H:i:s'),
                    'id_sentencia' => $sentenciaId
                ];
                if ($pdfModel->insert($pdfData)) {
                    log_message('info', 'PDF guardado exitosamente en la base de datos con ID de sentencia como nombre de archivo.');
                } else {
                    log_message('error', 'Error al guardar el PDF en la base de datos: ' . json_encode($pdfModel->errors()));
                }
            } else {
                log_message('error', 'Archivo PDF no es válido o ya fue movido.');
            }

            return redirect()->to('/sentencias')->with('message', 'Sentencia y PDF guardados con éxito');
        } else {
            log_message('error', 'Error al guardar la sentencia: ' . json_encode($sentenciasModel->errors()));
            return redirect()->back()->withInput()->with('errors', $sentenciasModel->errors());
        }
    }
    public function verpdfss($pdfs_id)
    {
        $ruta = WRITEPATH . 'pdfs/' . $pdfs_id . '.pdf';

        if (file_exists($ruta)) {
            return $this->response->setHeader('Content-Type', 'application/pdf')
                ->setBody(file_get_contents($ruta));
        } else {
            return redirect()->back()->with('error', 'El archivo PDF no existe.');
        }
    }

    public function yourFunctionName()
    {
        $model = new SentenciasModel(); // Asegúrate de que este es tu modelo de sentencias

        $query = $model->select('sentencias.*, pdfs.file_name, pdfs.file_path, juzgador.StrNombre, juzgador.StrApellidoPaterno, juzgador.StrApellidoMaterno')
            ->join('pdfs', 'sentencias.idSentencia = pdfs.id_sentencia', 'inner')
            ->join('juzgador', 'sentencias.Juzgador_idJuzgador = juzgador.idJuzgador', 'inner')
            ->findAll();

        $juzgadores = $this->juzgadorModel->where('Is_Activo', 1)->findAll();
        return view('advanced_search', ['sentencias' => $query, 'juzgadores' => $juzgadores]);

    }




    public function saveJuzgador()
{
    $juzgadorModel = new \App\Models\JuzgadorModel();
    $data = [
        'StrNombre' => $this->request->getPost('StrNombre'),
        'StrApellidoPaterno' => $this->request->getPost('StrApellidoPaterno'),
        'StrApellidoMaterno' => $this->request->getPost('StrApellidoMaterno'),
        'Is_Activo' => 1
    ];

    if ($juzgadorModel->insert($data)) {
        // Redirigir de vuelta al formulario de sentencias con el juzgador recién agregado
        return redirect()->to(base_url('sentencias/agregar'))->with('message', 'Juzgador guardado con éxito');
    } else {
        // Manejar el error en caso de que el juzgador no se haya guardado
        return redirect()->back()->withInput()->with('error', 'Error al guardar el juzgador');
    }
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
        $pdfModel = new PDFModel();

        // Capturar parámetros de búsqueda avanzada
        $NumExpediente = $this->request->getPost('NumExpediente');
        $NumAno = $this->request->getPost('NumAno');
        $Juzgador_idJuzgador = $this->request->getPost('Juzgador_idJuzgador');
        $StrCaracteristicasEspeciales = $this->request->getPost('StrCaracteristicasEspeciales');

        // Construir la consulta avanzada
        $query = $sentenciasModel->select('sentencias.*, juzgador.StrNombre AS juzgador_nombre, 
                                       juzgador.StrApellidoPaterno AS juzgador_apellido_paterno, 
                                       juzgador.StrApellidoMaterno AS juzgador_apellido_materno, 
                                       pdfs.file_name, pdfs.file_path')
            ->join('juzgador', 'sentencias.Juzgador_idJuzgador = juzgador.idJuzgador')
            ->join('pdfs', 'sentencias.pdf_id = pdfs.idpdfs', 'left')
            ->where('sentencias.Is_Activo', 1);

        // Aplicar filtros según parámetros ingresados
        if (!empty($NumExpediente)) {
            $query->like('NumExpediente', $NumExpediente);
        }

        if (!empty($NumAno)) {
            $query->where('NumAno', $NumAno);
        }

        if (!empty($Juzgador_idJuzgador)) {
            $query->where('sentencias.Juzgador_idJuzgador', $Juzgador_idJuzgador);
        }

        if (!empty($StrCaracteristicasEspeciales)) {
            $query->like('StrCaracteristicasEspeciales', $StrCaracteristicasEspeciales);
        }

        // Obtener los resultados y datos del juzgador
        $data['resultados'] = $query->findAll();
        $data['juzgadores'] = $juzgadorModel->where('Is_Activo', 1)->findAll();

        // Cargar la vista con los resultados de la búsqueda avanzada
        return view('sentencias/advanced_search', $data);
    }

    public function performAdvancedSearch()
    {
        $numExpediente = $this->request->getPost('NumExpediente');
        $numAno = $this->request->getPost('NumAno');
        $juzgadorId = $this->request->getPost('Juzgador_idJuzgador');
        $caracteristicas = $this->request->getPost('StrCaracteristicasEspeciales');

        /*/ Cargar el modelo
        $this->load->model('SentenciasModel');*/

        // Llamar al método de búsqueda
        $resultados = $this->sentenciasModel->buscarSentenciasAvanzadas($numExpediente, $numAno, $juzgadorId, $caracteristicas);

        return view('sentencias/advanced_search', ['resultados' => $resultados]);
    }


    public function results()
    {
        $sentenciasModel = new SentenciasModel();
        $juzgadorModel = new JuzgadorModel();
        $pdfModel = new PDFModel();

        // Obtener parámetros de búsqueda de la sesión
        $searchParams = $this->session->get('search_params');

        // Construir la consulta avanzada
        $query = $sentenciasModel->select('sentencias.*, juzgador.StrNombre AS juzgador_nombre, 
                                       juzgador.StrApellidoPaterno AS juzgador_apellido_paterno, 
                                       juzgador.StrApellidoMaterno AS juzgador_apellido_materno, 
                                       pdfs.file_name, pdfs.file_path')
            ->join('juzgador', 'sentencias.Juzgador_idJuzgador = juzgador.idJuzgador', 'left')
            ->join('pdfs', 'sentencias.idSentencia = pdfs.id_sentencia', 'left')
            ->where('sentencias.Is_Activo', 1);

        // Aplicar filtros de búsqueda
        if (!empty($searchParams['NumExpediente'])) {
            $query->like('sentencias.NumExpediente', $searchParams['NumExpediente']);
        }

        if (!empty($searchParams['NumAno'])) {
            $query->where('sentencias.NumAno', $searchParams['NumAno']);
        }

        if (!empty($searchParams['Juzgador_idJuzgador'])) {
            $query->where('sentencias.Juzgador_idJuzgador', $searchParams['Juzgador_idJuzgador']);
        }

        if (!empty($searchParams['StrCaracteristicasEspeciales'])) {
            $query->like('sentencias.StrCaracteristicasEspeciales', $searchParams['StrCaracteristicasEspeciales']);
        }

        // Ejecutar la consulta y almacenar los resultados
        $data['resultados'] = $query->findAll();
        $data['juzgadores'] = $juzgadorModel->where('Is_Activo', 1)->findAll();

        // Cargar la vista de resultados de búsqueda
        return view('sentencias/advanced_search_results', $data);
    }





    public function buscarSentenciasAvanzadas($numExpediente = null, $numAno = null, $juzgadorId = null, $caracteristicas = null)
    {
        // Iniciar la consulta seleccionando todos los campos de sentencias
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('Is_Activo', 1); // Solo sentencias activas

        // Aplicar filtros según parámetros de búsqueda proporcionados
        if (!empty($numExpediente)) {
            $builder->like('NumExpediente', $numExpediente);
        }

        if (!empty($numAno)) {
            $builder->where('NumAno', $numAno);
        }

        if (!empty($juzgadorId)) {
            $builder->where('Juzgador_idJuzgador', $juzgadorId);
        }

        if (!empty($caracteristicas)) {
            $builder->like('StrCaracteristicasEspeciales', $caracteristicas);
        }

        // Ejecutar la consulta y retornar los resultados
        return $builder->get()->getResultArray();
    }
}


