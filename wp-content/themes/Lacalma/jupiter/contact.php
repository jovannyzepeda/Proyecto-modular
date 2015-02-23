<?php
    require_once('contacto/config.inc');
    require_once('contacto/PHPMailer/PHPMailerAutoload.php');
    /**
    * limpia variables POST usnado filter_var
    */
    $nombre     = $_POST['nombre'];
    $correo     = $_POST['correo'];
    $tel        = $_POST['numero'];
    $comentario = $_POST['content'];
    $from       = $_POST['from'];
    $bandera    = 0;

    $valido     = true;
    if (!isset($nombre)) {
        $valido = false;
    }
    if (!filter_var($tel,FILTER_VALIDATE_INT)) {
        $valido = false;
    }
    if (!filter_var($correo,FILTER_VALIDATE_EMAIL)) {
        $valido = false;
    }
    if (!$valido) {
        $bandera = 1;
        header("HTTP/1.0 500 Internal Server Error");
    }


     /**
    * Obtiene el template de mail
    */
    $template   = file_get_contents("contacto/template.html");
    $dictionary = array (
                         '{nombre}'      => $nombre, 
                         '{correo}'      => $correo,
                         '{telefono}'    => $tel,
                         '{comentario}'  => $comentario
                         );
    $mail_template = strtr( $template, $dictionary);
    $mail          = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host       = SMTP_HOST; 
    $mail->SMTPAuth   = SMTP_AUTH;                  
    $mail->SMTPSecure = SMTP_SECURE;                
    $mail->Host       = SMTP_HOST;      
    $mail->Port       = SMTP_PORT;  
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->Subject    = "Adoptame , Veterinaria la Calma";
    $mail->SetFrom($correo,$nombre);
    $mail->AddReplyTo($correo,$nombre);
    $mail->AddAddress($from, "La calma");
    $mail->IsHTML(true);
    $mail->MsgHTML($mail_template);

    if($bandera == 0 ) {
        if(!$mail->Send()) {
            $bandera = 1;
            header("HTTP/1.0 500 Internal Server Error");
        }
    }

    if($bandera == 1) {
        echo ('Error : Han habido problemas con el envío, favor de intentar más tarde.');
    }
    else {
        echo 'Gracias por tu apoyo, juntos lograremos un mejor lugar para nuestros amigos.';
    }
?>