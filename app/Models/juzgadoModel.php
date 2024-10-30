<?php

namespace App\Models;

use CodeIgniter\Model;

class juzgadoModel extends Model
{
  protected $table = 'juzgado';
  protected $primaryKey = 'idjuzgado';
  protected $allowedFields = [
    'Juzagador_idJuzagador',
    'EntidadFederativa_idEntidadFederativa',
  ];
}
