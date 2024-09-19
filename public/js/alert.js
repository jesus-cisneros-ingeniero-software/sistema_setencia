document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("registerForm");
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      Swal.fire({
        icon: "success",
        title: "¡Registro exitoso!",
        text: "Tu formulario ha sido enviado correctamente.",
        confirmButtonText: "Todo bien",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "/"; // Redirige a la página principal
        }
      });
    });
  } else {
    console.error('El elemento con ID "registerForm" no se encontró.');
  }
});
