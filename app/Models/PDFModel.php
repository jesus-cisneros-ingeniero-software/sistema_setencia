<?php

namespace App\Models;

use CodeIgniter\Model;

class PDFModel extends Model
{
  protected $table = 'pdfs';
  protected $primaryKey = 'idpdfs';
  protected $allowedFields = ['file_name', 'file_path', 'created_at'];
}
