<?php

namespace App\Models;

use CodeIgniter\Model;


class PerfilModel extends Model
{
  protected $table = 'perfil'; // Nombre de la tabla en la base de datos
  protected $primaryKey = 'idperfil'; // Llave primaria
  protected $allowedFields = ['StrRol', 'DtmFechaCreacionTime', 'DtmFechaCambioTime', 'DtmFechaBajaTime']; // Campos permitidos
}
