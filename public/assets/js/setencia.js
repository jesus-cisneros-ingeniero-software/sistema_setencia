$(document).ready(function () {
  // Autocomplete para juzgadores
  var juzgadores = [ <
    ?
    php foreach($juzgadores as $juzgador) : ? > {
      label: "<?= $juzgador['StrNombre'] ?>",
      value: < ? = $juzgador['idJuzgador'] ? >
    }, <
    ?
    php endforeach; ? >
  ];

  $("#juzgador_autocomplete").autocomplete({
    source: juzgadores,
    select: function (event, ui) {
      // Cuando se selecciona un juzgador, se llena el campo oculto con su ID
      $("#Juzgador_idJuzgador").val(ui.item.value);
    }
  });

  // Guardar nuevo juzgador mediante AJAX
  $('#guardarJuzgador').click(function () {
    var nombre = $('#nuevo_juzgador_nombre').val();
    var apellidoP = $('#nuevo_juzgador_apellidoP').val();
    var apellidoM = $('#nuevo_juzgador_apellidoM').val();

    // Verifica que el nombre y apellido paterno estén completos
    if (nombre && apellidoP) {
      $.ajax({
        url: "<?= base_url('sentencias/save')", // Ruta para guardar el nuevo juzgador
        type: "POST",
        data: {
          StrNombre: nombre,
          StrApellidoPaterno: apellidoP,
          StrApellidoMaterno: apellidoM
        },
        success: function (response) {
          // Actualiza el campo de autocompletado con el nuevo juzgador
          $('#juzgador_autocomplete').val(nombre + ' ' + apellidoP + ' ' + apellidoM);
          $('#Juzgador_idJuzgador').val(response.idJuzgador); // Asigna el ID del juzgador recién creado
          $('#nuevoJuzgadorModal').modal('hide'); // Cierra el modal
        },
        error: function (xhr, status, error) {
          alert('Hubo un error al guardar el juzgador: ' + error);
        }
      });
    } else {
      alert('Por favor complete los campos requeridos');
    }
  });
});