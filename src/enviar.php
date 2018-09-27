<?php

function validar_campo($campo)
{
    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}

header("Content-type:application/json");

 if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
 isset($_POST["correo"]) && !empty($_POST["correo"]) &&
 isset($_POST["asunto"]) && !empty($_POST["asunto"]) &&
 isset($_POST["mensaje"]) && !empty($_POST["mensaje"])){

    $destinoMail = "renzo.aguilar.rojas@gmail.com";
    $nombre = validar_campo($_POST["nombre"]);
    if (isset($_POST["telefono"])) {
        $telefono = validar_campo($_POST["telefono"]);
    }
    $correo= validar_campo($_POST["correo"]);
    $asunto= validar_campo($_POST["asunto"]);
    $mensaje = validar_campo($_POST["mensaje"]);

    $contenido = "Nombre: " . $nombre . "\n Telefono: " . $telefono;
    $contenido = "\n Correo: " . $correo;
    $contenido = "\n Asunto: " . $asunto;
    $contenido = "\n Mensaje: " . $mensaje;

    mail($destinoMail, "Mensaje de contacto del cliente". $nombre, $contenido);
    return print(json_encode('ok'));
 }

 return print(json_encode('error'));
?>