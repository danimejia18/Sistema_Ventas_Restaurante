destroy = function(e) {
    let url = e.getAttribute('url');
    let token = e.getAttribute('token');

    Swal.fire({
        icon: 'question',
        title: '¿Desea continuar?',
        text: 'El cliente será eliminado',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí'
    }).then((res) => {
        if (res.isConfirmed) {
            const request = new XMLHttpRequest(); // Corrección aquí
            request.open('DELETE', url); // Asegúrate de usar DELETE
            request.setRequestHeader('X-CSRF-TOKEN', token);

            request.onload = () => {
                if (request.status === 200) {
                    e.closest('tr').remove(); // Eliminar la fila de la tabla
                    Swal.fire({
                        icon: 'success',
                        text: 'Cliente eliminado'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: 'Error al eliminar el cliente: ' + request.responseText
                    });
                }
            };

            request.onerror = (err) => {
                Swal.fire({
                    icon: 'error',
                    text: 'Error de conexión'
                });
            };

            request.send();
        }
    });
}
