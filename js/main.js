(function(){
    "use strict";

    var regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function(){

        //Mapa
        if (document.getElementById('pagina-principal')){
            var map = L.map('mapa').setView([-34.603775, -58.381594], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([-34.603775, -58.381594]).addTo(map)
                .bindPopup('GDLWebcamp 2019.<br> Boletos ya disponibles')
                .openPopup();

       };

        //Lettering
        $('.nombre-sitio').lettering();

        //Agregar Clase a Menu
        $('.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
        $('.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
        $('.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

        //Menu Fijo
        var windowHeigth = $(window).height();
        var barraAltura = $('.barra').innerHeight();
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if (scroll > windowHeigth){
                $('.barra').addClass('fixed');
                $('body').css({'margin-top': barraAltura+ 'px'});
            } else {
                $('.barra').removeClass('fixed');
                $('body').css({'margin-top': '0px'});
            }
        });

        //Menu Responsive
        $('.menu-movil').on('click', function(){
            $('.navegacion-principal').slideToggle();
        });

        //Programa de conferencias
        $('.ocultar').hide();
        $('.programa-evento .info-curso:first').show();
        $('.menu-programa a:first').addClass('activo');
        $('.menu-programa a').on('click', function(){
            $('.menu-programa a').removeClass('activo');
            $(this).addClass('activo');
            $('.ocultar').hide();
            var enlace = $(this).attr('href');
            $(enlace).fadeIn(750);
            return false;
        });

       if (document.getElementById('pagina-principal')){
           //Animaciones para los numeros
           var resumenLista = jQuery('.resumen-evento');
           if(resumenLista.length > 0) {
               $('.resumen-evento').waypoint(function() {
                   $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6}, 1200);
                   $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15}, 1200);
                   $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3}, 1200);
                   $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9}, 1200);
               }, {
                   offset: '60%'
               });
           }

            //Cuenta Regresiva
            $('.cuenta-regresiva').countdown('2022/12/10 09:00:00', function(event){
                $('#dias').html(event.strftime('%D'));
                $('#horas').html(event.strftime('%H'));
                $('#minutos').html(event.strftime('%M'));
                $('#segundos').html(event.strftime('%S'));
            });
       };

       if (document.getElementById('pagina-principal') || document.getElementById('pagina-invitados')){
            //Colorbox
            $('.invitado-info').colorbox({inline:true, width:"50%"});
            $('.boton_newsletter').colorbox({inline:true, width:"50%"});
       };

    });// DOM CONTENT LOADED
})();