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
        'LITIS',
        'DtmFecha_Creacion',
        'DtmFechaCambioTime',
        'DtmFechaBajaTime',
        'Is_Activo',
        'entidad_id',
        'Tribunales',
        'pdf_id',
        'conflicto'
    ];
    protected $tribunalesModel;


    public function __construct()
    {
        parent::__construct();
        $this->tribunalesModel = new \App\Models\TribunalesModel(); // Asegúrate de que este modelo exista
    }
    public function getTribunales($entidadId)
    {
        try {
            // Lógica para obtener tribunales basado en el $entidadId
            $tribunales = $this->tribunalesModel->getTribunalesPorEntidad($entidadId);
            echo json_encode($tribunales);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }





    /*public function buscarSentenciasAvanzadas($numExpediente, $numAno, $juzgadorId, $caracteristicas)
    {
        return $this->where('NumExpediente', $numExpediente)
            ->where('NumAno', $numAno)
            ->where('Juzgador_idJuzgador', $juzgadorId)
            ->like('StrCaracteristicasEspeciales', $caracteristicas)
            ->findAll();
    }*/
}
