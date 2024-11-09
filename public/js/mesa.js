destroy = function(e) {
    let url = e.getAttribute('url'); // Obtiene la URL del atributo
    let token = e.getAttribute('token'); // Obtiene el token CSRF del atributo

    Swal.fire({
        icon: 'question',
        title: '¿Desea continuar?',
        text: 'La mesa será eliminada',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí'
    }).then((res) => {
        if (res.isConfirmed) {
            const request = new XMLHttpRequest(); // Corrección: instanciar correctamente XMLHttpRequest
            request.open('DELETE', url); // Usa 'DELETE' en mayúsculas
            request.setRequestHeader('X-CSRF-TOKEN', token); // Configurar el encabezado CSRF

            request.onload = () => {
                if (request.status === 200) {
                    e.closest('tr').remove(); // Eliminar la fila de la tabla
                    Swal.fire({
                        icon: 'success',
                        text: 'Mesa eliminada'
                    });
                } else {
                    // Manejar errores si el estado no es 200
                    Swal.fire({
                        icon: 'error',
                        text: 'Error al eliminar la mesa: ' + request.responseText
                    });
                }
            };

            request.onerror = () => {
                Swal.fire({
                    icon: 'error',
                    text: 'Error de conexión'
                });
            };

            request.send(); // Enviar la solicitud
        }
    });
}
