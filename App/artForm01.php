<?php

// aquí voy a gestionar lo que reciba del formulario

// 1 recibir los datos del formulario a través de POST y meto los value en nuevas variables que usaré aquí

// comprobación de términos
if(empty($_POST['terminos'])){
    // Como viene vacía, redirijo a la página de contacto
    // echo "Hay un error pues no ha aceptado las condiciones de privacidad";
    header('location:/?error=condiciones');
    die;
}else{
    $terminos = $_POST['terminos'];
}

// comprobación de captcha
$respUser = $_POST['respUser'];
$respSystem = $_POST['respSystem'];
// que venga vacío
if(!isset($respUser)){
   header('location:/?error=captchaVacio');
    die;  
}
// que la respuesta sea errónea
if($respUser != $respSystem){
    header('location:/?error=captchaError');
    die; 
}

// Recoger el resto de valores del form
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Zona de comprobaciones DEV
// echo $nombre.'<br>'.$telefono.'<br>'.$email.'<br>'.$mensaje.'<br>'.$terminos.'<br>'.$respUser.'<br>'.$respSystem;


// 2 comprobar que los datos son correctos.
// que nombre venga vacío, salimos
if(empty($nombre)){
    header('location:/?error=nombreVacio');
    die; 
}
// que nombre sea menor de 3 y mayor de 40, salimos
$contadorCaracteres = strlen($nombre);
if($contadorCaracteres < 3 || $contadorCaracteres > 40){
    header('location:/?error=nombreCaracteres');
    die; 
}

// que teléfono venga vacío, salimos
if(empty($telefono)){
    header('location:/?error=telefonoVacio');
    die; 
}

// que correo venga vacío, salimos
if(empty($email)){
    header('location:/?error=emailVacio');
    die; 
}

// que correo no tenga la forma de un correo, salimos (expresión regular)
$regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
if(!preg_match($regex, $email)){
    header('location:/?error=emailSintaxis');
    die;   
}


// que mensaje venga vacío, salimos
if(empty($mensaje)){
    header('location:/?error=mensajeVacio');
    die; 
}

// que mensaje sea menor de 4 y mayor de 200, salimos
// que nombre sea menor de 3 y mayor de 40, salimos
$contadorCaracteres = strlen($mensaje);
if($contadorCaracteres < 4 || $contadorCaracteres > 200){
    header('location:/?error=mensajeCaracteres');
    die; 
}


// 3 enviar correos de aviso: a la empresa y al propio usuario



// 4 guardar los datos en una bbdd



// 5 redirigir a la página gracias


?>