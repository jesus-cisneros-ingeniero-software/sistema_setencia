<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
  protected $table = 'usuario';
  protected $id = 'idUsuario';
  protected $allowedFields = [
    'fkPerfil',
    'StrUsuario',
    'StrPassword',
    'StrNombre',
    'StrApellidoPaterno',
    'StrApellidoMaterno',
    'is_activo',
    'DtmFecha_Creacion',
    'DtmFechaCambioTime',
    'DtmFechaBajaTime'
  ];

  protected $returnType = 'object';
}
