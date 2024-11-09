destroy = function(e) {
    let url = e.getAttribute('url');
    let token = e.getAttribute('token');

    Swal.fire({
        icon: 'question',
        title: '¿Desea continuar?',
        text: 'El acceso será eliminado',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí'
    }).then((res) => {
        if (res.isConfirmed) {
            const request = new XMLHttpRequest(); // Corrección aquí, debe ser XMLHttpRequest()
            request.open('DELETE', url); // Usa 'DELETE' en mayúsculas
            request.setRequestHeader('X-CSRF-TOKEN', token); // Configurar el encabezado CSRF

            request.onload = () => {
                if (request.status == 200) {
                    e.closest('tr').remove(); // Eliminar la fila de la tabla
                    Swal.fire({
                        icon: 'success',
                        text: 'Acceso eliminado'
                    });
                } else {
                    // Manejar errores si el estado no es 200
                    Swal.fire({
                        icon: 'error',
                        text: 'Error al eliminar el acceso: ' + request.responseText
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
