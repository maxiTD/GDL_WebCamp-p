$(document).ready(function() {
    $('.sidebar-menu').tree()

    $('#registros').DataTable({
        'paging'      : true,
        'pagelength'  : 10,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'language'    : {
            paginate: {
                next: 'Siguiente',
                previous: 'Anerior',
                last: 'Último',
                first: 'Primero'
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
            emptyTable: 'No hay registros',
            infoEmpty: '0 Registros',
            search: 'Buscar: '
        }
    });

    $('#crear-registro-admin').attr('disabled', true);

    //Validar que los dos campos de password coincidan
    $('#repetir-password').on('blur', function() {
        var password_nuevo = $('#password').val();

        if ($(this).val() == password_nuevo) {
            $('#resultado-password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('#crear-registro-admin').attr('disabled', false);
        } else {
            $('#resultado-password').text('*los campos no coinciden.');
            $('#resultado-password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        }
    });

    //Date picker
    $('#fecha-evento').datepicker({
        autoclose: true
    })

    //Timepicker
    $('.timepicker').timepicker({
        showInputs: false
    })

    //IconPicker
    $('#icono').iconpicker();

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass   : 'iradio_flat-blue'
    });

    $.getJSON('servicio-registrados.php', function(data) {
        // LINE CHART
        var line = new Morris.Line({
            element: 'grafica-registros',
            resize: true,
            data: data,
            xkey: 'fecha',
            ykeys: ['cantidad'],
            labels: ['Item 1'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });
    });

});
