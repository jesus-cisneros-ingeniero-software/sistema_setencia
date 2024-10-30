<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TribunalController extends BaseController
{
    public function consultarEntidad()
    {
        // Conectar a la base de datos SQL Server
        $db = \Config\Database::connect('sqlsrv');

        try {
            // Ejecutar el procedimiento almacenado con el parámetro @intOperacion = 5
            $sql = "EXEC uspEntidad @intOperacion = ?";
            $query = $db->query($sql, [5]);

            // Obtener los resultados
            $result = $query->getResult();

            // Verificar si hay resultados
            if (empty($result)) {
                return redirect()->back()->with('error', 'No se encontraron entidades.');
            }

            // Pasar los resultados a la vista
            return view('sentencias/new', ['entidades' => $result]);

        } catch (\Exception $e) {
            // Manejar errores de conexión o de consulta
            log_message('error', 'Error al ejecutar el procedimiento almacenado: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un problema al consultar las entidades.');
        }
    }
}
