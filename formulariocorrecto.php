<?php
/**
 * 
 *
 * 
 * 
 */

if (empty($_POST["nombre"])) {
    exit("Completar");
}

if (empty($_POST["correo"])) {
    exit("Completar");
}

if (empty($_POST["mensaje"])) {
    exit("Completar");
}

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

$correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
if (!$correo) {
    echo "Correo inválido. Intenta con otro correo.";
    exit;
}

$asunto = "Nuevo mensaje de sitio web";

$datos = "De: $nombre\nCorreo: $correo\nMensaje: $mensaje";
$mensaje = "Has recibido un mensaje desde el formulario de contacto de tu sitio web. Aquí están los detalles:\n$datos";
$destinatario = "feligerding@gmail.com"; 
$encabezados = "Sender: feligerding@gmail.com\r\n"; 
$encabezados .= "From: $nombre <" . $correo . ">\r\n";
$encabezados .= "Reply-To: $nombre <$correo>\r\n";
$resultado = mail($destinatario, $asunto, $mensaje, $encabezados);
if ($resultado) {
    echo "<h1>Mensaje enviado, ¡Gracias por contactarme!</h1>";
    echo "<p>Tu mensaje se ha enviado correctamente.</p><h2>Importante</h2><p>Revisa tu bandeja de SPAM, en ocasiones mis respuestas quedan ahí. </p>";
} else {
    echo "Tu mensaje no se ha enviado. Intenta de nuevo.";
}