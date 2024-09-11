<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{

  protected $table = 'producto';

  protected $allowedFields = ['id', 'codigo', 'nombre', 'descripcion', 'precio'];


  public function getProductos()
  {
    return $this->findAll();
  }

  public function GuadarProducto($prod)
  {
    return $this->save($prod); //metodo save guarda toda la informacion en la base datos
  }

  public function getProducto($id)
  {

    return $this->where('id', $id)->first($id); //buscamos el registro con el id
  }

  public function ActualizarProducto($id, $prod)
  {

    return $this->update($id, $prod);
  }
}
