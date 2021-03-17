$(document).ready(function() {

    //Guardar un registro
    $('#guardar-registro').on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;

                console.log(resultado);

                if (resultado.respuesta == 'exito') {
                    Swal.fire(
                    '¡Correcto!',
                    'Se guardó correctamente.',
                    'success'
                    )
                } else {
                    Swal.fire(
                        '¡Error!',
                        'Hubo un error.',
                        'error'
                    )
                }
            }
        })
    });

    //Guardar un registro con archivos
    $('#guardar-registro-archivo').on('submit', function(e) {
        e.preventDefault();

        var datos = new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data) {
                var resultado = data;

                console.log(resultado);

                if (resultado.respuesta == 'exito') {
                    Swal.fire(
                    '¡Correcto!',
                    'Se guardó correctamente.',
                    'success'
                    )
                } else {
                    Swal.fire(
                        '¡Error!',
                        'Hubo un error.',
                        'error'
                    )
                }
            }
        })
    });

    //Eliminar un registro
    $('.borrar-registro').on('click', function(e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');

        Swal.fire({
            title: '¿Estás Seguro?',
            text: "Esta acción no se puede deshacer",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'post',
                    data: {
                        'id_registro': id,
                        'registro': 'eliminar'
                    },
                    url: 'modelo-'+tipo+'.php',
                    success: function(data) {
                        var resultado = JSON.parse(data);

                        if (resultado.respuesta == 'exito') {
                            Swal.fire(
                                'Eliminado!',
                                'El registro de eliminó correctamente.',
                                'success'
                            )
                            jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error!',
                                text: 'Error al eliminar el registro'
                            })
                        }
                    }
                })
            }
        })
    });
});