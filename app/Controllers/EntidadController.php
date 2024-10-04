<?php

namespace App\Controllers;

use App\Models\UsuarioModel; // Si necesitas usar UsuarioModel

class EntidadController extends BaseController
{
  public function consultarEntidad()
  {
    // Conectar a la base de datos SQL Server
    $db = \Config\Database::connect('sqlsrv');

    // Ejecutar el procedimiento almacenado con el parámetro @intOperacion = 1
    $sql = "EXEC uspEntidad @intOperacion = ?";
    $query = $db->query($sql, [1]);

    // Obtener los resultados
    $result = $query->getResult();

    // Pasar los resultados a la vista
    return view('sentencias/new', ['entidades' => $result]);
  }
}
