 !function(){"use strict";document.getElementById("regalo"),document.addEventListener("DOMContentLoaded",function(){var e;document.getElementById("pagina-principal")&&(e=L.map("mapa").setView([-34.603775,-58.381594],15),L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(e),L.marker([-34.603775,-58.381594]).addTo(e).bindPopup("GDLWebcamp 2019.<br> Boletos ya disponibles").openPopup()),$(".nombre-sitio").lettering(),$('.conferencia .navegacion-principal a:contains("Conferencia")').addClass("activo"),$('.calendario .navegacion-principal a:contains("Calendario")').addClass("activo"),$('.invitados .navegacion-principal a:contains("Invitados")').addClass("activo");var n=$(window).height(),a=$(".barra").innerHeight();$(window).scroll(function(){var e=$(window).scrollTop();n<e?($(".barra").addClass("fixed"),$("body").css({"margin-top":a+"px"})):($(".barra").removeClass("fixed"),$("body").css({"margin-top":"0px"}))}),$(".menu-movil").on("click",function(){$(".navegacion-principal").slideToggle()}),$(".ocultar").hide(),$(".programa-evento .info-curso:first").show(),$(".menu-programa a:first").addClass("activo"),$(".menu-programa a").on("click",function(){$(".menu-programa a").removeClass("activo"),$(this).addClass("activo"),$(".ocultar").hide();var e=$(this).attr("href");return $(e).fadeIn(750),!1}),document.getElementById("pagina-principal")&&(0<jQuery(".resumen-evento").length&&$(".resumen-evento").waypoint(function(){$(".resumen-evento li:nth-child(1) p").animateNumber({number:6},1200),$(".resumen-evento li:nth-child(2) p").animateNumber({number:15},1200),$(".resumen-evento li:nth-child(3) p").animateNumber({number:3},1200),$(".resumen-evento li:nth-child(4) p").animateNumber({number:9},1200)},{offset:"60%"}),$(".cuenta-regresiva").countdown("2022/12/10 09:00:00",function(e){$("#dias").html(e.strftime("%D")),$("#horas").html(e.strftime("%H")),$("#minutos").html(e.strftime("%M")),$("#segundos").html(e.strftime("%S"))})),(document.getElementById("pagina-principal")||document.getElementById("pagina-invitados"))&&($(".invitado-info").colorbox({inline:!0,width:"50%"}),$(".boton_newsletter").colorbox({inline:!0,width:"50%"}))})}();