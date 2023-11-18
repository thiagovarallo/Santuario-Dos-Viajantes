<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'playerthiago86@gmail.com';                     //SMTP username
    $mail->Password   = 'cawhsyiaoazvomqr';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet = 'utf8';

    //Recipients
    $mail->setFrom('playerthiago86@gmail.com', 'Santuário dos Viajantes');
    $mail->addAddress('thiagovaralllo@gmail.com', 'Joe User');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Confirmação de Reserva - Santuário dos Viajantes';
    $mail->Body    = '
    
    <h3>Prezado [Nome do Hóspede],</h3>

    <p>É com prazer que confirmamos a sua reserva no Santuário dos Viajantes. Estamos ansiosos para recebê-lo e proporcionar uma estadia memorável. Abaixo, você encontrará os detalhes da sua reserva:</p>
    
    <ul> 
        <li>Nome do Hotel: Santuário dos Viajantes</li>
        <li>Data de Check-in: [Data]</li>
        <li>Data de Check-out: [Data]</li>
        <li>Número de Hóspedes: [Número de Adultos e Crianças]</li>
        <li>Tipo de Quarto: [Tipo de Quarto Reservado]</li>
        <li>Tarifa Total: [Valor Total]</li>
    </ul>

    <p>Lembre-se de que estas informações estão sujeitas a confirmação no momento do check-in. Recomendamos que revise os detalhes da sua reserva para garantir que estejam corretos. Caso haja alguma discrepância ou se precisar de assistência adicional, não hesite em entrar em contato conosco.</p>    
    
    <p>Pedimos que esteja ciente das políticas de cancelamento do hotel e, se necessário, faça quaisquer alterações com antecedência. Caso tenha alguma solicitação especial ou requisito dietético, por favor, informe-nos com antecedência para que possamos fazer os devidos arranjos.</p>
    
    <p>Agradecemos por escolher o Santuário dos Viajantes e estamos ansiosos para recebê-lo em breve. Tenha uma viagem segura até aqui!</p>
    
    <p>Atenciosamente,<p>
    
    [Seu Nome]
    [Seu Cargo]
    Santuário dos Viajantes
    [Seus Detalhes de Contato]';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}