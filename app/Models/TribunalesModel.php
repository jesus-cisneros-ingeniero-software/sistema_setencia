<?php
namespace App\Models;

use CodeIgniter\Model;

class TribunalesModel extends Model
{
    protected $table = 'tribunales';
    protected $primaryKey = 'idTribunal';

    public function getTribunalesPorEntidad($entidadId)
    {
        return $this->where('entidad_id', $entidadId)->findAll();
    }
}

