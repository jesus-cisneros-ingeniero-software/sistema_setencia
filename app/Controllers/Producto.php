<?php

namespace App\Controllers;

use App\Models\ProductosModel;

class Producto extends BaseController
{
  private $modeloProducto;

  function __construct()
  {
    $this->modeloProducto = new ProductosModel();
  }

  public function index()
  {
    $campos = $this->modeloProducto->getProductos();

    echo view('/plantilla/header');
    echo view('/productos/mostrar', compact('campos'));
    echo view('/plantilla/footer');
  }

  public function mostrar()
  {
    echo view('/plantilla/header');
    echo view('/productos/agregar');
    echo view('/plantilla/footer');
  }

  public function traer()
  {
    //regresa un boolean
    $validacion = $this->validate([

      'codigo' => [
        'rules' => 'required|numeric|max_length[50]|is_unique[producto.codigo]|greater_than[-1]',
        'errors' => [
          'required' => 'El campo codigo esta vacio',
          'is_unique' => 'El codigo ya existe',
          'greater_than' => 'Solo numeros iguales a 0 o mayores',
          'numeric' => 'Solo puros numeros',
          'max_length' => 'maxico 50 numeros'

        ]
      ],

      'nombre' => [
        'rules' => 'required|min_length[6]|max_length[30]',
        'errors' => [
          'required' => 'El campo nombre esta vacio',
          'min_length' => 'Para registar el nombre minimo debe de tener 6 letras',
          'max_length' => 'El nombre del producto no debe de ser mayor a 30 caracteres'
        ]
      ],

      'descripcion' => [
        'rules' => 'required|max_length[250]',
        'errors' => [
          'required' => 'El campo descripción esta vacio',
          'max_length' => 'La descrion es maximo de 250 caracteres'

        ]
      ],

      'precio' => [
        'rules' => 'required|numeric|greater_than[0]',
        'errors' => [
          'required' => 'El campo precio esta vacio',
          'numeric' => 'Solo puros numeros',
          'greater_than' => 'El precio debe de ser mayor que 0'

        ]
      ]
    ]);

    if ($_POST && $validacion) {

      $productos = [
        'codigo' => $_POST['codigo'],
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio']
      ];

      $this->modeloProducto->GuadarProducto($productos);


      session()->setFlashdata('mensaje', 'Producto Guardado');

      return redirect()->to(base_url('/producto')); //se redirecciona

    } else {
      $mesaje = $this->validator->listErrors(); //nos muesra los errores en caso de que la vlidacion sea false
      //se carga una vez y de poca duracion
      session()->setFlashdata('mensaje', $mesaje);
      return redirect()->to(base_url('/producto/crear')); //se redirecciona
    }
  }

  public function editar($id)
  {

    $traer = $this->modeloProducto->getProducto($id);

    echo view('/plantilla/header');
    echo view('/productos/modificar', compact('traer'));
    echo view('plantilla/footer');
  }


  public function actualizar()
  {

    $validacion = $this->validate([
      'codigo' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'El campo codigo esta vacio'


        ]
      ],

      'nombre' => [
        'rules' => 'required|min_length[6]|max_length[30]',
        'errors' => [
          'required' => 'El campo nombre esta vacio',
          'min_length' => 'Para registar el nombre minimo debe de tener 6 letras',
          'max_length' => 'El nombre del producto no debe de ser mayor a 30 caracteres'
        ]
      ],

      'descripcion' => [
        'rules' => 'required|max_length[250]',
        'errors' => [
          'required' => 'El campo descripción esta vacio',
          'max_length' => 'La descrion es maximo de 250 caracteres'

        ]
      ],

      'precio' => [
        'rules' => 'required|numeric|greater_than[0]',
        'errors' => [
          'required' => 'El campo precio esta vacio',
          'numeric' => 'Solo puros numeros',
          'greater_than' => 'El precio debe de ser mayor que 0'

        ]
      ]
    ]);

    if ($validacion) {

      $productos = [
        'id' => $_POST['id'],
        'codigo' => $_POST['codigo'],
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio']
      ];
      $id = $_POST['id'];
      $this->modeloProducto->ActualizarProducto($id, $productos);

      session()->setFlashdata('mensaje', 'Producto Modificado');

      return redirect()->to(base_url('/producto')); //se redirecciona

    } else {
      $id = $_POST['id'];
      $mesaje = $this->validator->listErrors(); //nos muesra los errores en caso de que la vlidacion sea false
      //se carga una vez y de poca duracion
      session()->setFlashdata('mensaje', $mesaje);
      return redirect()->to(base_url('/producto/editar/' . $id)); //se redirecciona
    }
  }

  public function eliminar($id)
  {

    $this->modeloProducto->delete($id);
    session()->setFlashdata('mensaje', 'Producto Eliminado');
    return redirect()->to(base_url('/producto'));
  }
}
