<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: ". $nombre . "<br>correo: "  . $correo ."<br>telefono: "  . $telefono ."<br>mensaje: "  . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                        // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'abdiaserito@gmail.com';                     // SMTP username
    $mail->Password   = 'eritoabdias';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('abdiaserito@gmail.com', $nombre);
    $mail->addAddress('abdiaserito@gmail.com');     // Add a recipient


 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'asunto muy importante';
    $mail->Body    = $body;
    $matl->CharSet ='UTF-8';
    $mail->send();
    echo '<script>
        alert("elmensaje se envio correctamente");
        window.history.go(-1);
        </script> ';
} catch (Exception $e) {
    echo " Error: {$mail->ErrorInfo}";
}