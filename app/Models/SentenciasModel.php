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
    'entidad_id'
  ];
}
