<?php
namespace App\Models;
use CodeIgniter\Model;

class SentenciasModel extends Model
{
  protected $table = 'sentencias';
  protected $primaryKey = 'idSentencia';
  protected $allowedFields = [
    'fkUsuario_idUsuario',
    'Juzgador_idJuzgador',
    'NumExpediente',
    'NumAno',
    'StrResumen',
    'StrCaracteristicasEspeciales',
    'LITIS',
    'DtmFecha_Creacion',
    'DtmFechaCambioTime',
    'DtmFechaBajaTime',
    'Is_Activo',
    'strEntFedId',
    'entidad_id',
     'unidadadministartiva',
      'areaadministrativa',
      'tribunal'//abrebiatura del tribunal
  ];
    public function buscarSentenciasAvanzadas($numExpediente, $numAno, $juzgadorId, $caracteristicas)
    {
        // Aquí puedes construir la consulta con los parámetros recibidos
        return $this->where('NumExpediente', $numExpediente)
            ->where('NumAno', $numAno)
            ->where('Juzgador_idJuzgador', $juzgadorId)
            ->like('StrCaracteristicasEspeciales', $caracteristicas)
            ->findAll();
    }
}
