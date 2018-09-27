$(document).ready(function() {
      
        $(".formulario-contacto").bind("submit", function(){

            $.ajax({
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function(respuesta) {
                    if(respuesta == "ok"){
                        $("#alerta").removeClass("hide").addClass("alert-success");
                        $(".respuesta").html("¡Enviado!");
                        $(".mensaje_alerta").html("El Mensaje ha sido enciado correctamente");
                    }else {
                        $("#alerta").removeClass("hide").addClass("alert-danger");
                        $(".respuesta").html("¡Error al enviar!");
                        $(".mensaje_alerta").html("No se puede enviar el mensaje, intentalo de nuevo");
                    }
                    
                },
                error: function() {
                    $("#alerta").removeClass("hide").addClass("alert-danger");
                    $(".respuesta").html("¡Error al enviar!");
                    $(".mensaje_alerta").html("No se puede enviar el mensaje, inetentalo de nuevo");
                }
                
            });
            $(".formulario-contacto")[0].reset();
            return false;
            
        });
    }
);