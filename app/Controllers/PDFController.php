<?php

namespace App\Controllers;

use App\Models\PDFModel;
use CodeIgniter\Controller;

class PDFController extends Controller
{

  public function index()
  {

    $model = new PDFModel();


    // Obtener todos los archivos almacenados en la base de datos
    $data['files'] = $model->findAll();

    // Pasar los datos a la vista
    return view('pdfs/list', $data);
  }
  public function upload()
  {
    return view('pdfs/upload'); // Mostrar el formulario de subida
  }

  public function download($fileName)
  {
    $filePath = WRITEPATH . 'uploads/pdfs/' . $fileName;

    if (file_exists($filePath)) {
      // Debugging para ver la ruta
      echo "Ruta completa: " . $filePath;
      return $this->response->download($filePath, null);
    } else {
      return redirect()->back()->with('error', 'El archivo no existe.');
    }
  }

  public function store()
  {
    $model = new PDFModel();

    // Validar si el archivo ha sido subido
    $file = $this->request->getFile('pdf_file');
    if ($file->isValid() && !$file->hasMoved()) {
      $directory = WRITEPATH . 'uploads/pdfs/';
      $files = glob($directory . '*.pdf');

      $lastFileNumber = count($files) ? max(array_map(
        function ($filename) {
          return (int)basename($filename, '.pdf');
        },
        $files
      )) : 0;
      $nextFileNumber = $lastFileNumber + 1;
      $newFileName = $nextFileNumber . '.pdf';

      // Mover el archivo subido a la ubicación final
      $file->move($directory, $newFileName);

      // Guardar la información del archivo en la base de datos
      $data = [
        'file_name' => $newFileName,
        'file_path' => $directory . $newFileName,
        'created_at' => date('Y-m-d H:i:s')
      ];
      $model->save($data);

      return redirect()->to('/pdfs')->with('message', 'Archivo subido exitosamente');
    } else {
      return redirect()->back()->with('error', 'Error al subir el archivo');
    }
  }
}
