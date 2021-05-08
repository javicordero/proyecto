$(".del_id").on('click', function (e) {
    e.preventDefault();
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            '¡Eliminado!!',
            'El objeto se ha borrado',
            'success'
            )
            $("#del_event"+$(this).attr('data-attrId')).submit();
        }
    })
})
