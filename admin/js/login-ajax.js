$(document).ready(function() {
    //Login
    $('#login-admin').on('submit', function(e) {
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
                if (resultado.respuesta == 'exitoso') {
                    Swal.fire(
                    '¡Correcto!',
                    'Bienvenid@ ' + resultado.usuario + '!',
                    'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'admin-area.php';
                    }, 2000);
                } else {
                    Swal.fire(
                        '¡Error!',
                        'Usuario o password incorrectos.',
                        'error'
                    )
                }
            }
        })
    });
});