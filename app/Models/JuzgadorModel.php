<?php

namespace App\Models;

use CodeIgniter\Model;

class JuzgadorModel extends Model
{
  protected $table = 'juzgador';
  protected $primaryKey = 'idJuzgador';
  protected $allowedFields = [
    'StrNombre',
    'StrApellidoPaterno',
    'StrApellidoMaterno',
    'Is_Activo'
  ];
}
