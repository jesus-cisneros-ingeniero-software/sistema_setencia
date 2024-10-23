<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UsuarioController extends BaseController
{
    public function consultaUsuario()
    {
        // Conectar a la base de datos SQL Server
        $db = \Config\Database::connect('sqlsrv');

        // Parámetros para el procedimiento almacenado
        $usuario = 'ADMCISNJ';
        $password = 'MTk5MlNFQ1JFVEFSSUFERUxUUkFCQUpPWVBSRVZJU0lPTlNPQ0lBTFBST0ZFREVUU0VDUkVUQVJJQURFTFRSQUJBSk9ZUFJFVklTSU9OU09DSUFMUFJPRkVERVQ=';

        // Ejecutar el procedimiento almacenado
        $sql = "EXEC uspConsultausuario @Str_Usuario = ?, @Str_Password = ?";
        $query = $db->query($sql, [$usuario, $password]);

        // Obtener y mostrar los resultados
        $result = $query->getResult();

        // Ver resultados (puedes retornar o renderizar la vista aquí)
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }
}

