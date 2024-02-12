document.addEventListener("DOMContentLoaded", function() {
	var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {
		backdrop: 'static'
	});

	// Agregar un manejador de eventos al botón "Aceptar"
	document.getElementById("btn-aceptar").addEventListener("click", function() {
		// Aquí puedes realizar cualquier acción necesaria antes de cerrar el modal
		// Después de realizar la acción, cierra el modal
		myModal.hide();
	});

	// Mostrar el modal
	myModal.show();
});

document.addEventListener("DOMContentLoaded", function() {
	var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
	myModal.show();
  });