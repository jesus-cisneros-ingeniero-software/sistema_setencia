<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
  protected $table = 'usuario';
  protected $id = 'idUsuario';
  protected $allowedFields = [
    'StrUsuario',
    'fkPerfil',
    'StrPassword',
    'StrNombre',
    'StrApellidoPaterno',
    'StrApellidoMaterno',
    'is_activo',
    'Dtmfecha_creacion'
  ];

  protected $returnType = 'object';
}
