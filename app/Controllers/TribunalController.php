<?php

namespace App\Controllers;

class TribunalController extends BaseController
{
    public function consultarEntidad($entidadId)
    {
        $db = \Config\Database::connect('sqlsrv');
        $sql = "EXEC uspSARCTipoJunta @int_Operacion = ?, @entidadId = ?";
        $query = $db->query($sql, [5, $entidadId]);
        $result = $query->getResult();

        return view('sentencias/new', ['entidades' => $result]);
    }

    public function cargarTribunales($entidadId)
    {
        $db = \Config\Database::connect('sqlsrv');
        $sql = "EXEC uspSARCTipoJunta @int_Operacion = ?, @entidadId = ?";
        $query = $db->query($sql, [5, $entidadId]);
        $tribunales = $query->getResult();

        return $this->response->setJSON($tribunales);
    }
    public function test()
    {
        return "TribunalesModel está funcionando";
    }
}
