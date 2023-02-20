<?php

require("../conexion.php");
// la funcion trim es para sacar los espacios en blanco de una posible cadena de caracteres

$jonipo = trim($_POST['jonipoForm']);
$nombre = trim($_POST['nombreForm']);
$telefono = trim($_POST['telefonoForm']);
$correo = trim($_POST['correoForm']);
$asunto = trim($_POST['asuntoForm']);
$mensaje = trim($_POST['mensajeForm']);


//strlen es longitud de cadena, es decir que IF strlen viene sin contenido, vuelve al formulario ...


if(
strlen($jonipo) > 0
){
return false;
} elseif (
strlen($nombre) == 0
|| strlen($telefono) == 0
|| strlen($correo) == 0
|| strlen($asunto) == 0
|| strlen($mensaje) == 0
) {
echo "<span class='erroricon'></span><span>Todos los campos son obligatorios!</span>";
die();
}


$insert = mysqli_query($conexion, "INSERT INTO formulario(jonipo, nombre, telefono, correo, asunto, mensaje, fecha) VALUES('$jonipo','$nombre', '$telefono', '$correo', '$asunto','$mensaje', NOW()) ") or die(mysqli_error($conexion));


mysqli_close($conexion);
if($insert) {
	echo "<span class='checkicon'></span><span>Gracias por tu mensaje!</span>";
} else {
	echo "<span class='erroricon'></span><span>El mensaje no pudo ser enviado</span>";
}


$destinatario = "clubtomavino@gmail.com";
$asunto = "Contacto desde la web para #Tomavino";

$cuerpo = "Datos enviados por el Formulario de Contacto \r\n";
$cuerpo .= "Jonipo: $jonipo \r\n";
$cuerpo .= "Nombre: $nombre \r\n";
$cuerpo .= "Telefono: $telefono \r\n";
$cuerpo .= "Email: $correo \r\n";
$cuerpo .= "Asunto: $asunto \r\n";
$cuerpo .= "Mensaje: $mensaje";

$enviomail = mail($destinatario, $asunto, $cuerpo);


?>